# Git Version
==========

# Versionamento automatico do Git

## Dependence:
git-flow

## Exemplos:

### Gerando uma nova release

```bash 
$ gitversion r
```

#### O comando acima retorna algo parecido com:

```bash
$ start 0.1.0
$ Switched to a new branch 'release/0.1.0'
$ 
$ Summary of actions:
$ - A new branch 'release/0.1.0' was created, based on 'develop'
$ - You are now on branch 'release/0.1.0'
$ 
$ Follow-up actions:
$ - Bump the version number now!
$ - Start committing last-minute fixes in preparing your release
$ - When done, run:
$ 
$      git flow release finish '0.1.0'
$ 
$ finish 0.1.0
$ Switched to branch 'master'
$ Switched to branch 'develop'
$ [release/0.1.0 7c11d94] @rel
$  1 file changed, 1 insertion(+)
$  create mode 100644 VERSION
$ Merge made by the 'recursive' strategy.
$  VERSION    |  1 +
$  gitversion | 53 +++++++++++++++++++++++++++++++++++++++++++++++++++++
$  2 files changed, 54 insertions(+)
$  create mode 100644 VERSION
$  create mode 100755 gitversion
$ Merge made by the 'recursive' strategy.
$  VERSION | 1 +
$  1 file changed, 1 insertion(+)
$  create mode 100644 VERSION
$ Deleted branch release/0.1.0 (was 7c11d94).
$ 
$ Summary of actions:
$ - Latest objects have been fetched from 'origin'
$ - Release branch has been merged into 'master'
$ - The release was tagged 'v0.1.0'
$ - Release branch has been back-merged into 'develop'
$ - Release branch 'release/0.1.0' has been deleted

```

### Iniciando um novo hotfix:

```bash 
$ gitversion h start
```

#### O Comando acima retorna algo parecido com:

```bash 
$ start 0.1.1
$ Switched to a new branch 'hotfix/0.1.1'

$ Summary of actions:
$ - A new branch 'hotfix/0.1.1' was created, based on 'master'
$ - You are now on branch 'hotfix/0.1.1'

$ Follow-up actions:
$ - Bump the version number now!
$ - Start committing your hot fixes
$ - When done, run:

$      git flow hotfix finish '0.1.1'

$ Or:
$  gitv h finish

```

### Finalizando um novo hotfix:

```bash
$ gitversion h finish
```
#### O Comando acima retorna algo parecido com:

```bash
$ finish 0.1.1
$ [hotfix/0.1.1 87dfead] @fix
$  1 file changed, 1 insertion(+), 1 deletion(-)
$ Switched to branch 'master'
$ Switched to branch 'develop'
$ Merge made by the 'recursive' strategy.
$  VERSION | 2 +-
$  1 file changed, 1 insertion(+), 1 deletion(-)
$ Merge made by the 'recursive' strategy.
$  VERSION | 2 +-
$  1 file changed, 1 insertion(+), 1 deletion(-)
$ Deleted branch hotfix/0.1.1 (was 87dfead).
$ 
$ Summary of actions:
$ - Latest objects have been fetched from 'origin'
$ - Hotfix branch has been merged into 'master'
$ - The hotfix was tagged 'v0.1.1'
$ - Hotfix branch has been back-merged into 'develop'
$ - Hotfix branch 'hotfix/0.1.1' has been deleted
```
