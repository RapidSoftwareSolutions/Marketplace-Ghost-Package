[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Ghost/functions?utm_source=RapidAPIGitHub_GhostFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Ghost Package
Ghost is a fully open source, hackable platform for building and running a modern online publication. We power blogs, magazines and journalists from Zappos to Sky News.
* Domain: [ghost.org](https://ghost.org/)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Register on [ghost.org](https://ghost.org/).  
2. Create your personal blog.
3. Send a request to support@ghost.org for clientId and clientSecret.
 
 ## Custom datatypes:
   |Datatype|Description|Example
   |--------|-----------|----------
   |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
   |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
   |List|Simple array|```["123", "sample"]```
   |Select|String with predefined values|```sample```
   |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```

 
## Ghost.getAccessToken
Exchange a clientId and clientSecret for an API accessToken.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| API client id.
| clientSecret| credentials| API client secret.
| blogUrl     | String     | Link of the blog on which we will receive data.
| username    | String     | User email.
| password    | String     | User password.

## Ghost.getAllPosts
The getAllPosts endpoint allows you to browse all published posts on a particular blog.By default it returns a paginated set of 15 published posts in reverse chronological order (newest first) and excludes pages.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| API Access Token.
| blogUrl     | String| Link of the blog on which we will receive data.
| include     | Select| Include related data.Options - tags,author,tags and author.
| limit       | Number| How many posts to retrieve.
| showAllPosts| Select| Retrieve all posts.
| page        | Number| Which page of paginated results to retrieve.The page parameter allows you to specify which page of a paginated collection to return.
| order       | String| Choose which field to order by and direction of ordering.You can choose any valid resource field in ascending (asc) or descending (desc) order.Example:id desc.
| fields      | List  | Allows you to specify which resource fields to retrieve rather than retrieving the. whole object.
| filter      | String| Use Ghost Query Language to build complex query.
| resource    | String| Id or slug changes query to a read request.

## Ghost.getPost
This endpoint allows you to read a specific post based on its id.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| API Access Token.
| blogUrl    | String| Link of the blog on which we will receive data.
| postId     | String| Post id you need to get.
| include    | Select| Include related data.Options - tags,author,tags and author.

## Ghost.getPostBySlug
This endpoint allows you to read a specific post based on its slug.You can then use the parameters to to specify which data to collect. By default it returns a paginated set of 15 tags in order of database row (first row first).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| API Access Token.
| blogUrl    | String| Link of the blog on which we will receive data.
| slug       | String| Post slug you need to get.
| include    | Select| Include related data.Options - tags,author,tags and author.

## Ghost.getAllTags
The getAllTags endpoints allow you to browse all tags on a particular blog.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| includeCountPosts| Select| Include related count posts data.Options - Yes,No.
| limit            | Number| How many posts to retrieve.
| showAllPosts     | Select| Retrieve all posts on page.
| page             | Number| Which page of paginated results to retrieve.The page parameter allows you to specify which page of a paginated collection to return.
| order            | String| Choose which field to order by and direction of ordering.You can choose any valid resource field in ascending (asc) or descending (desc) order.Example:id desc.
| fields           | List  | Allows you to specify which resource fields to retrieve rather than retrieving the. whole object.
| filter           | String| Use Ghost Query Language to build complex query.
| resource         | String| Id changes query to a read request.

## Ghost.getTag
This endpoint allows you to read a specific tag based on its id.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| tagId            | String| Tag id you need to get.
| includeCountPosts| Select| Include related count posts data.Options - Yes,No.

## Ghost.getTagBySlug
This endpoint allows you to read a specific tag based on its slug.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| slug             | String| Tag slug you need to get.
| includeCountPosts| Select| Include related count posts data.

## Ghost.getAllUsers
The getAllUsers endpoint allows you to browse all active users on a particular blog.By default it returns a paginated set of 15 active users in descending order of last_login.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| includeCountPosts| Select| Include related count posts data.
| limit            | Number| How many posts to retrieve.
| showAllPosts     | Select| Retrieve all posts on page.Options - Yes,No.
| page             | Number| Which page of paginated results to retrieve.The page parameter allows you to specify which page of a paginated collection to return.
| order            | String| Choose which field to order by and direction of ordering.You can choose any valid resource field in ascending (asc) or descending (desc) order.Example:id desc.
| fields           | List  | Allows you to specify which resource fields to retrieve rather than retrieving the. whole object.
| filter           | String| Use Ghost Query Language to build complex query.

## Ghost.getUser
This endpoint allows you to read a specific user based on its id.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| userId           | String| User id you need to get.
| includeCountPosts| Select| Include related count posts data.Options - Yes,No.

## Ghost.getUserBySlug
This endpoint allows you to read a specific user based on its slug.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| slug             | String| User slug you need to get.
| includeCountPosts| Select| Include related count posts data.Options - Yes,No.

## Ghost.getUserByEmail
This endpoint allows you to read a specific user based on its email.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| API Access Token.
| blogUrl          | String| Link of the blog on which we will receive data.
| email            | String| User email you need to get.
| includeCountPosts| Select| Include related count posts data. Options - Yes,No.

