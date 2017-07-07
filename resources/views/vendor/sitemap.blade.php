<?php echo '<'.'?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>
    @foreach($categories as $category)
    <url>
        <loc>{{ url('danh-muc/'.$category->slug.'.html') }}</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>
    @endforeach
    @foreach($posts as $post)
        <url>
            <loc>{{url('/')}}/{{$post->cate_slug}}/{{$post->post_slug}}.{{$post->id}}.html</loc>
            <priority>1.0</priority>
            <lastmod>
                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->updated_at))->toW3cString() !!}
            </lastmod>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>