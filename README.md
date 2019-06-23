> This version of relgen hosted on Tool Forge has largely been **superseded by a [JS-based version available directly on Wikimedia Commons](https://commons.wikimedia.org/wiki/Commons:Wikimedia_OTRS_release_generator)**. For more information, please refer to the [Village pump announcement](https://commons.wikimedia.org/wiki/Commons:Village_pump/Archive/2019/04#New_Wikimedia_OTRS_release_generator_now_live_on_Commons) or the relgen.js [source code](https://commons.wikimedia.org/wiki/MediaWiki:Relgen.js). The relgen express functionality documented below is not available in relgen.js, and all versions of relgen on Tool Forge will remain available for the foreseeable future.

## [relgen express](//tools.wmflabs.org/relgen/express.php) documentation

**parameters**

|  |  |
| ---- | ---- |
| `file` | file name or external URL (*required unless `s2=2`*) |
| `name` | sender name |
| `rep` | copyright holder (*requires `s1=2`*) |
| `auth` | sender authority (*requires `s1=2`*) |
| `license` | suggested license |
|  |  |
| `s1` | personal options (2 for representative) |
| `s2` | file options (2 for attached file, 3 for external files) |
| `s3` | content options (2 for release of depicted work, 3 for release of depicted work and media work) |
|  |  |

**examples**

* https://tools.wmflabs.org/relgen/express.php?file=Example.jpg (release of Example.jpg)
* https://tools.wmflabs.org/relgen/express.php?file=http://example.org/example.jpg&s2=3 (release of external file example.jpg hosted on example.org)
* https://tools.wmflabs.org/relgen/express.php?file=Example.jpg&rep=Ace+Inc.&license=CC+BY+4.0&s1=2&s3=2 (release of work depicted in Example.jpg by an Ace Inc. representative with CC BY 4.0 suggested)


## frequently asked questions

**How can I translate relgen into a different language?**

Since different language editions of Wikimedia projects have different release templates and procedures there will be no translation interfaces, however, you may manually add a duplicate of [index.php](https://github.com/toollabs/relgen/blob/master/index.php) (named i18n/[ISO 639-1 code].php) with all texts in the language of your choice to the repository through a pull request. Please make sure the language has an ISO 639-1 code before translating and keep in mind that the tool is still very much a work in progress.
