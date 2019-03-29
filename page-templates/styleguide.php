<?php
/* Template Name: Styleguide */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'template-parts/title' ); ?>
			<div class="entry-content container">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</div><!-- .entry-content -->
<div class="container">

<h1>Heading One h1</h1>
<h2>Heading Two h2</h2>
<h3>Heading Three h3</h3>
<h4>Heading Four h4</h4>
<h5>Heading Five h5</h5>
<h6>Heading Six h6</h6>
<h1 class="display-1">Display 1</h1>
<h1 class="display-2">Display 2</h1>
<h1 class="display-3">Display 3</h1>
<h1 class="display-4">Display 4</h1>
<p class="lead">
  Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
</p>
<p>You can use the mark tag to <mark>highlight</mark> text.</p>
<p><del>This line of text is meant to be treated as deleted text.</del></p>
<p><s>This line of text is meant to be treated as no longer accurate.</s></p>
<p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
<p><u>This line of text will render as underlined</u></p>
<p><small>This line of text is meant to be treated as fine print.</small></p>
<p><strong>This line rendered as bold text.</strong></p>
<p><em>This line rendered as italicized text.</em></p>
<p><abbr title="attribute">attr</abbr></p>
<p><abbr title="HyperText Markup Language" class="initialism">HTML</abbr></p>
<blockquote class="blockquote">
  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>


<h2>Headings</h2>

<h2>Blockquotes</h2>
Single line blockquote:
<blockquote>Stay hungry. Stay foolish.</blockquote>
Multi line blockquote with a cite reference:
<blockquote>People think focus means saying yes to the thing you've got to focus on. But that's not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I'm actually as proud of the things we haven't done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs - Apple Worldwide Developers' Conference, 1997</cite></blockquote>
<h2>Tables</h2>
<table>
<tbody>
<tr>
<th>Employee</th>
<th class="views">Salary</th>
<th></th>
</tr>
<tr class="odd">
<td><a href="http://john.do/">John Saddington</a></td>
<td>$1</td>
<td>Because that's all Steve Job' needed for a salary.</td>
</tr>
<tr class="even">
<td><a href="http://tommcfarlin.com/">Tom McFarlin</a></td>
<td>$100K</td>
<td>For all the blogging he does.</td>
</tr>
<tr class="odd">
<td><a href="http://jarederickson.com/">Jared Erickson</a></td>
<td>$100M</td>
<td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>
</tr>
<tr class="even">
<td><a href="http://chrisam.es/">Chris Ames</a></td>
<td>$100B</td>
<td>With hair like that?! Enough said...</td>
</tr>
</tbody>
</table>
<h2>Definition Lists</h2>
<dl>
 	<dt>Definition List Title</dt>
 	<dd>Definition list division.</dd>
 	<dt>Startup</dt>
 	<dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd>
 	<dt>#dowork</dt>
 	<dd>Coined by Rob Dyrdek and his personal body guard Christopher "Big Black" Boykins, "Do Work" works as a self motivator, to motivating your friends.</dd>
 	<dt>Do It Live</dt>
 	<dd>I'll let Bill O'Reilly will <a title="We'll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">explain</a> this one.</dd>
</dl>
<h2>Unordered Lists (Nested)</h2>
<ul>
 	<li>List item one
<ul>
 	<li>List item one
<ul>
 	<li>List item one</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ul>
</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ul>
</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ul>
<h2>Ordered List (Nested)</h2>
<ol>
 	<li>List item one
<ol>
 	<li>List item one
<ol>
 	<li>List item one</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ol>
</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ol>
</li>
 	<li>List item two</li>
 	<li>List item three</li>
 	<li>List item four</li>
</ol>
<h2>HTML Tags</h2>
These supported tags come from the WordPress.com code <a title="Code" href="http://en.support.wordpress.com/code/">FAQ</a>.

<strong>Address Tag</strong>

<address>1 Infinite Loop
Cupertino, CA 95014
United States</address><strong>Anchor Tag (aka. Link)</strong>

This is an example of a <a title="Apple" href="http://apple.com">link</a>.

<strong>Abbreviation Tag</strong>

The abbreviation <abbr title="Seriously">srsly</abbr> stands for "seriously".

<strong>Acronym Tag</strong>

The acronym <acronym title="For The Win">ftw</acronym> stands for "for the win".

<strong>Big Tag</strong>

These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5.

<strong>Cite Tag</strong>

"Code is poetry." --<cite>Automattic</cite>

<strong>Code Tag</strong>

You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.

<strong>Delete Tag</strong>

This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead).

<strong>Emphasize Tag</strong>

The emphasize tag should <em>italicize</em> text.

<strong>Insert Tag</strong>

This tag should denote <ins>inserted</ins> text.

<strong>Keyboard Tag</strong>

This scarsly known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.

<strong>Preformatted Tag</strong>

This tag styles large blocks of code.
<pre>.post-title {
	margin: 0 0 5px;
	font-weight: bold;
	font-size: 38px;
	line-height: 1.2;
}</pre>
<strong>Quote Tag</strong>

<q>Developers, developers, developers...</q> --Steve Ballmer

<strong>Strong Tag</strong>

This tag shows <strong>bold<strong> text.</strong></strong>

<strong>Subscript Tag</strong>

Getting our science styling on with H<sub>2</sub>O, which should push the "2" down.

<strong>Superscript Tag</strong>

Still sticking with science and Albert Einstein's&nbsp;E = MC<sup>2</sup>, which should lift the "2" up.

<strong>Teletype Tag</strong>

This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag.

<strong>Variable Tag</strong>

This allows you to denote <var>variables</var>.

</div>


			<?php if ( get_edit_post_link() ) : ?>
				<?php acorn_entry_footer(); ?>
			<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->
	<?php
	endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();