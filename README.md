gitversion
==========

Versionamento automatico do git

Exemplos:

Gerando uma nova release

```bash 

$ gitversion r

Return:

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

Gerando um novo hotfix:

```bash 

$ gitv h start

Return

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
