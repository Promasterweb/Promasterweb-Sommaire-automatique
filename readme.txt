=== Promasterweb – Sommaire automatique ===
Contributors: promasterweb
Tags: table of contents, toc, seo, blog, posts
Requires at least: 5.8
Tested up to: 6.9.1
Requires PHP: 7.4
Stable tag: 2.3.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically generates a clean, SEO-friendly table of contents from H2 headings in your WordPress posts — zero configuration required.

== Description ==

**Promasterweb – Automatic Table of Contents** instantly adds a lightweight, accessible, and SEO-optimized table of contents at the top of your WordPress blog posts.

No settings. No shortcodes. No page builders required. Just activate the plugin and it works.

The plugin scans your post content, detects all H2 headings, generates clean anchor links, and displays a numbered table of contents — automatically. It only appears when a post contains at least 2 H2 headings, so it never shows up where it doesn't belong.

= Why use a table of contents? =

A table of contents improves the reading experience on long-form content by letting visitors jump directly to the section they're interested in. It also helps search engines understand the structure of your content, which can positively impact your SEO rankings and generate sitelinks in Google search results.

= Key Features =

* Automatic TOC generation — no shortcodes, no manual work
* Scans H2 headings only (best SEO practice)
* Generates clean, short, readable anchor links
* Removes stop words and accents from anchors for better URLs
* Anchor length limited to 4 meaningful words
* Guaranteed unique anchors — no ID conflicts
* Only displays when the post has at least 2 H2 headings
* CSS loaded only on single post pages — zero performance impact on the rest of the site
* Fully accessible with ARIA label on the nav element
* Compatible with Gutenberg, Classic Editor, and any standard HTML editor
* No options page — nothing to configure

= How it works =

1. You write your post with H2 headings as section titles
2. The plugin scans the content, extracts each H2
3. A clean anchor ID is generated and injected into each heading
4. A numbered table of contents is inserted at the top of the post
5. Visitors can click any item to jump directly to that section

= Perfect for =

* Blog posts and long-form articles
* Tutorials and how-to guides
* News and editorial content
* Any content-heavy WordPress site

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin from the **Plugins** menu in WordPress
3. Open any post that contains at least 2 H2 headings
4. The table of contents will appear automatically at the top of the post

No configuration needed. It works out of the box.

== Frequently Asked Questions ==

= Does it work with the Gutenberg block editor? =
Yes. It works with Gutenberg, the Classic Editor, and any editor that outputs standard HTML content.

= Does it work with page builders like Elementor or Divi? =
It depends on how the page builder outputs content. If the builder uses the standard `the_content` filter and renders H2 tags in the post body, the plugin will work. Some builders bypass this filter, in which case the TOC may not appear.

= Can I use it on pages or custom post types? =
No. The plugin is intentionally limited to standard WordPress posts (blog posts). This keeps it lightweight and focused.

= Why only H2 headings? =
H2 is considered the correct heading level for main sections in a blog post (H1 being the post title). Using H2 for your section titles is a widely recommended SEO practice, and limiting the TOC to H2 keeps the structure clean and relevant.

= Can I disable the TOC on a specific post? =
Not yet. The TOC automatically appears on any post with at least 2 H2 headings. A per-post disable option may be added in a future version.

= Does the plugin slow down my site? =
No. The plugin is extremely lightweight. It processes content only on single post pages, and the CSS file is enqueued only where needed. There is no database query, no JavaScript, and no external resource loaded.

= Will it conflict with other TOC plugins? =
It may if another TOC plugin is also active and modifying the same content. We recommend using only one table of contents plugin at a time.

= Does it support multilingual content? =
Yes. The plugin support others languages.

= Is the output accessible? =
Yes. The table of contents is wrapped in a `<nav>` element with an `aria-label="Table of Contents"` attribute for screen reader compatibility.

== Screenshots ==

1. Example of the automatic table of contents displayed at the top of a blog post.
2. Smooth anchor navigation between sections when clicking a TOC link.

== Changelog ==

= 2.3.0 =
* Added WPML compatibility with multilingual stop words (French, English, Spanish, German)

= 2.2.0 =
* The table of contents title is automatically translated based on the site language settings.

= 2.1.0 =
* SEO and performance improvements for long posts

= 1.1.0 =
* Optimized SEO anchor generation
* Anchor length limited to 4 meaningful words
* Duplicate ID handling added
* Improved H2 parsing reliability

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 2.1.0 =
SEO and performance improvements. Recommended update for all users.