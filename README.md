EE-Is-Entry
===========

A very simple ExpressionEngine plugin allowing you to check if a given entry_id or url_title is a channel entry.

## Usage
This plugin has one parameter and can simply be passed a entry ID or an entry URL title. It returns a boolean.

For example if you were in the index template of your blog group on your website, you can test if there's a URL title or entry ID in the URL and if there is show the article page.

```html
{if {exp:is_entry check="{last_segment}"}}
    {embed="Blog/post"}
{if:else}
    <!-- No article in the URL, show the blog listing page -->
    {embed="Blog/listing"}
{/if}
```
