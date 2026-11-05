"""Require immutable external uses references in workflows and local actions."""

import re
import sys
from pathlib import Path

import yaml


def check(node, path, seen):
    if node is None or id(node) in seen:
        return []
    seen.add(id(node))
    errors = []
    if isinstance(node, yaml.MappingNode):
        for key, value in node.value:
            if key.value == "uses":
                reference = value.value if isinstance(value, yaml.ScalarNode) else ""
                if reference.startswith("./"):
                    valid = True
                elif reference.startswith("docker://"):
                    valid = re.fullmatch(r"docker://[^\s@]+@sha256:[0-9a-f]{64}", reference)
                else:
                    valid = re.fullmatch(r"[^\s@]+/[^\s@]+@[0-9a-f]{40}", reference)
                if not valid:
                    errors.append(f"{path}:{value.start_mark.line + 1}: pin uses to a full commit SHA or Docker sha256 digest")
            errors.extend(check(value, path, seen))
    elif isinstance(node, yaml.SequenceNode):
        for value in node.value:
            errors.extend(check(value, path, seen))
    return errors


paths = [Path(path) for path in sys.argv[1:]] or sorted(
    path for path in Path(".github").rglob("*")
    if path.suffix in {".yml", ".yaml"}
    and (path.parent == Path(".github/workflows") or path.stem == "action")
)
errors = []
for path in paths:
    try:
        errors.extend(check(yaml.compose(path.read_text(), Loader=yaml.SafeLoader), path, set()))
    except yaml.YAMLError as error:
        errors.append(f"{path}: invalid YAML: {error}")

if errors:
    print("\n".join(errors), file=sys.stderr)
    sys.exit(1)
print(f"All action references are pinned ({len(paths)} YAML files checked).")
