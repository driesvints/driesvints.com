---
extends: _layouts.post
section: content
title: Code Style formatting with Github Actions
date: 2020-05-03
---
Yesterday I dived into [Prettier](https://prettier.io) and [PHP CS Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer) for my projects. So I decided to write a quick blog post on the subject. I managed to get a great quick start by reading these two excellent blog posts by [Freek Van der Herten](https://twitter.com/freekmurze) and [Stefan Zweifer](https://twitter.com/_stefanzweifel) on the subject:

- [Tools to automatically format PHP, JavaScript and CSS files](https://freek.dev/1252-tools-to-automatically-format-php-javascript-and-css-files)
- [Run prettier or php-cs-fixer with GitHub Actions](https://stefanzweifel.io/posts/run-prettier-or-php-cs-fixer-with-github-actions/)

In the end, I decided to combine the two in a single workflow but in two jobs:

```yaml
name: Code Style

on: [push]

jobs:
  php-cs-fixer:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Run PHP CS Fixer
        uses: docker://oskarstark/php-cs-fixer-ga
        with:
          args: --config=.php_cs.dist --allow-risky=yes

      - name: Extract branch name
        shell: bash
        run: echo "##[set-output name=branch;]$(echo ${GITHUB_REF#refs/heads/})"
        id: extract_branch

      - name: Commit changes
        uses: stefanzweifel/git-auto-commit-action@v2.3.0
        with:
          commit_message: Fix styling
          branch: ${{ steps.extract_branch.outputs.branch }}
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}

  prettier:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Install NPM dependencies
        run: npm ci

      - name: Run Prettier
        run: npm run format

      - name: Commit changes
        uses: stefanzweifel/git-auto-commit-action@v2.3.0
        with:
          commit_message: Apply Prettier changes
          branch: ${{ github.head_ref }}
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
```

The benefit of this is that your Github Actions will be neatly grouped in Pull Requests and the Github Actions overview:

<p class="image">
    <img src="/assets/images/posts/code-style-formatting-with-github-actions.png" alt="Github Actions" style="zoom:50%">
</p>

Also, we only run them on push so any code that gets merged with incorrect styling will be automatically fixed. Here's the full Pull Request for Laravel.io where we added the workflow and set up Prettier and PHP CS Fixer: [https://github.com/laravelio/laravel.io/pull/520](https://github.com/laravelio/laravel.io/pull/520)

