# Support Overview

This document is a short list with all currently supported API calls. The reference for this list is the official documentation of the [Evalanche Soap Api Connector by SC-Networks](https://github.com/SC-Networks/evalanche-soap-api-connector/blob/master/docs/index.md).



## Support Request

Feel free to open up a [feature request issue](#). I will look at it and implement it probably later on in the project.



## Client Overview

- 🔜 [**Article** (6/8)](#article)
- ✅ [**ArticleType**](#articletype)
- ✅ [**ContainerType**](#client-overview)
- ✅ [**Folder**](#client-overview)
- 🔜  **ArticleTemplate**
- 🔜  **Container**
- 🔜  **Document**
- 🔜  **Image**
- 🔜  **Mailing**
- 🔜  **MailingTemplate**
- ✅ [**Pool**](#pool)
- 🔜 [**Profile** (11/25)](#profile)
- 🔜  **Targetgroup**
- ❌ **~~Account~~** - *Not supported*
- ❌ **~~Blacklist~~** - *Not supported*
- ❌ **~~CouponList~~** - *Not supported*
- ❌ **~~Form~~** - *Not supported*
- ❌ **~~Mandator~~** - *Not supported*
- ❌ **~~Milestone~~** - *Not supported*
- ❌ **~~Pooldataminer~~** - *Not supported*
- ❌ **~~Report~~** - *Not supported*
- ❌ **~~Scoring~~** - *Not supported*
- ❌ **~~Smartlink~~** - *Not supported*
- ❌ **~~User~~** - *Not supported*
- ❌ **~~Webhook~~** - *Not supported*
- ❌ **~~Workflow~~** - *Not supported*


-----


## Article

|Status|Method|Details|
|:-:|-|-|
|✅|**create()**                            |`folder()->createArticle()`
|✅|**getByFolderId()**                     |`folder()->getArticles()`
|✅|**getById()**                           |`article()->get()`
|✅|**delete()**                            |`article()->delete()`
|✅|**copy()**                              |`article()->copyTo()`
|✅|**move()**                              |`article()->moveTo()`
|🔜|**getDetailById()**                     |*Planned*
|🔜|**update()**                            |*Planned*
|❌|**~~getListByMandatorId()~~**           |*Not supported*
|❌|**~~getByTypeId()~~**                   |*Not supported*
|❌|**~~getDefaultFolderByMandatorId()~~**  |*Not supported*
|❌|**~~getTypeIds()~~**                    |*Not supported*
|❌|**~~getByExternalId()~~**               |*Not supported*

[↑ **Get back to the client overview**](#client-overview)


## ArticleType

|Status|Method|Details|
|:-:|-|-|
|✅|**create()**                                  |`folder()->createArticleType()`
|✅|**getByFolderId()**                           |`folder()->getArticleTypes()`
|✅|**getById()**                                 |`articleType()->get()`
|✅|**delete()**                                  |`articleType()->delete()`
|✅|**addAttribute()**                            |`articleType()->addAttribute()`
|✅|**getAttributes()**                           |`articleType()->getAttributes()`
|✅|**removeAttribute()**                         |`articleType()->deleteAttribute()`
|✅|**addAttributeGroup()**                       |`articleType()->addGroup()`
|✅|**getAttributeGroups()**                      |`articleType()->getGroups()`
|✅|**removeAttributeGroup()**                    |`articleType()->deleteGroup()`
|✅|**copy()**                                    |`articleType()->copyTo()`
|✅|**move()**                                    |`articleType()->moveTo()`
|✅|**createAttributeOption()**                   |`articleType()->addOption()`
|✅|**getAttributeOptions()**                     |`articleType()->getOptions()`
|✅|**removeAttributeOption()**                   |`articleType()->deleteOption()`
|❌|**~~assignRoleToAttribute()~~**               |*Not supported*
|❌|**~~changeAttributeType()~~**                 |*Not supported*
|❌|**~~getApplicableRoleTypes()~~**              |*Not supported*
|❌|**~~getAssignedRoleTypes()~~**                |*Not supported*
|❌|**~~getByExternalId()~~**                     |*Not supported*
|❌|**~~getByTypeId()~~**                         |*Not supported*
|❌|**~~getDefaultFolderByMandatorId()~~**        |*Not supported*
|❌|**~~getListByMandatorId()~~**                 |*Not supported*
|❌|**~~getTypeIds()~~**                          |*Not supported*

[↑ **Get back to the client overview**](#client-overview)


## ContainerType

|Status|Method|Details|
|:-:|-|-|
|✅|**create()**                                  |`folder()->createContainerType()`
|✅|**getByFolderId()**                           |`folder()->getContainerTypes()`
|✅|**getById()**                                 |`containerType()->get()`
|✅|**delete()**                                  |`containerType()->delete()`
|✅|**addAttribute()**                            |`containerType()->addAttribute()`
|✅|**getAttributesByResourceId()**               |`containerType()->getAttributes()`
|✅|**removeAttribute()**                         |`containerType()->deleteAttribute()`
|✅|**addAttributeGroup()**                       |`containerType()->addGroup()`
|✅|**getAttributeGroupsByResourceId()**          |`containerType()->getGroups()`
|✅|**removeAttributeGroup()**                    |`containerType()->deleteGroup()`
|✅|**copy()**                                    |`containerType()->copyTo()`
|✅|**move()**                                    |`containerType()->moveTo()`
|✅|**addAttributeOption()**                      |`containerType()->addOption()`
|✅|**getAttributeOptionsByResourceIdAndAttributeId()**|`containerType()->getOptions()`
|✅|**removeAttributeOption()**                   |`containerType()->deleteOption()`
|❌|**~~getByExternalId()~~**                     |*Not supported*
|❌|**~~getByTypeId()~~**                         |*Not supported*
|❌|**~~getDefaultFolderByMandatorId()~~**        |*Not supported*
|❌|**~~getListByMandatorId()~~**                 |*Not supported*
|❌|**~~getTypeIds()~~**                          |*Not supported*
|❌|**~~updateAttribute()~~**                     |*Not supported*
|❌|**~~updateAttributeType()~~**                 |*Not supported*

[↑ **Get back to the client overview**](#client-overview)


## Folder

|Status|Method|Details|
|:-:|-|-|
|✅|**create()**                                  |`folder()->createFolder()`
|✅|**delete()**                                  |`folder()->delete()`
|✅|**getSubFolderById()**                        |`folder()->getFolders()`
|✅|**get()**                                     |`folder()->get()`

[↑ **Get back to the client overview**](#client-overview)


## Pool

|Status|Method|Details|
|:-:|-|-|
|✅|**copy()**                                    |`pool()->copyTo()`
|✅|**delete()**                                  |`pool()->get()`
|✅|**getByFolderId()**                           |`folder()->getPools()`
|✅|**getById()**                                 |`pool()->moveTo()`
|✅|**move()**                                    |`pool()->delete()`
|✅|**addAttribute()**                            |`pool()->addAttribute()`
|✅|**deleteAttribute()**                         |`pool()->deleteAttribute()`
|✅|**getAttributesByPool()**                     |`pool()->getAttributes()`
|✅|**addAttributeOption()**                      |`pool()->addOption()`
|✅|**deleteAttributeOption()**                   |`pool()->deleteOption()`
|❌|**updateAttributeOption()**                   |*Not supported*
|❌|**~~getListByMandatorId()~~**                 |*Not supported*
|❌|**~~getByExternalId()~~**                     |*Not supported*
|❌|**~~getByTypeId()~~**                         |*Not supported*
|❌|**~~getDefaultFolderByMandatorId()~~**        |*Not supported*
|❌|**~~getTypeIds()~~**                          |*Not supported*

[↑ **Get back to the client overview**](#client-overview)


## Profile

|Status|Method|Details|
|:-:|-|-|
|✅|**delete()**                       |`profile()->delete()`
|✅|**getById()**                      |`profile()->get()`
|✅|**getByKey()**                     |`pool()->getProfiles()`
|✅|**getByPool()**                    |`pool()->getProfiles()`
|✅|**getJobInformationByJobId()**     |`job()->update()`
|✅|**getResultCursorByJobId()**       |`job()->getChunkPosition()`
|✅|**getResultByJobId()**             |`job()->getChunk()`
|✅|**setResultCursor()**              |`job()->setChunkPosition()`
|✅|**updateById()**                   |`profile()->update()`
|✅|**updateByKey()**                  |`pool()->updateProfiles()`
|✅|**updateByPool()**                 |`pool()->updateProfiles()`
|🔜|**create()**                       |`pool()->createProfile()`
|🔜|**getBounces()**                   |*Planned*
|🔜|**getByTargetGroup()**             |*Planned for TargetGroup*
|🔜|**getGrantedPermissions()**        |*Planned*
|🔜|**getMailingStatus()**             |*Planned*
|🔜|**getModifiedProfiles()**          |*Planned*
|🔜|**getTrackingHistory()**           |*Planned*
|🔜|**getUnsubscriptions()**           |*Planned*
|🔜|**grantPermission()**              |*Planned*
|🔜|**isInTargetgroups()**             |*Planned for TargetGroup*
|🔜|**massUpdate()**                   |*Planned*
|🔜|**revokePermission()**             |*Planned*
|🔜|**revokeTracking()**               |*Planned*
|🔜|**updateByTargetGroup()**          |*Planned for TargetGroup*
|❌|**~~addScore()~~**                 |*Not supported*
|❌|**~~getActivityScoringHistory()~~**|*Not supported*
|❌|**~~getByMilestone()~~**           |*Not supported*
|❌|**~~getScoresByProfileId()~~**     |*Not supported*
|❌|**~~hasMilestone()~~**             |*Not supported*
|❌|**~~mergeById()~~**                |*Not supported*
|❌|**~~mergeByKey()~~**               |*Not supported*
|❌|**~~mergeByPoolId()~~**            |*Not supported*
|❌|**~~mergeByTargetGroupId()~~**     |*Not supported*
|❌|**~~setMilestone()~~**             |*Not supported*
|❌|**~~tagWithOption()~~**            |*Not supported*
|❌|**~~untagWithOption()~~**          |*Not supported*

[↑ **Get back to the client overview**](#client-overview)
