<?php

$gallery = [
    [
        "img" => "img/gallery/gallery1.png",
        "title" => "Modern Living Room",
        "text" => "Our ceramic vases and decor pieces add a touch of sophistication to this modern living room.",
    ],
    [
        "img" => "img/gallery/gallery2.png",
        "title" => "Cozy Dining Area",
        "text" => "Explore the world of handcrafted ceramics and discover the craftsmanship behind each unique piece. Learn about the artisans who bring these creations to life.",
    ],
    [
        "img" => "img/gallery/gallery3.png",
        "title" => "Caring for Your Ceramic Collection",
        "text" => "Discover how our ceramic dinnerware enhances the charm of this cozy dining area. ",
    ],
];

?>
<div class="gallery container section_padding">
    <h2 class="section_title">Project Gallery</h2>
    <div class="row">
    @foreach ($gallery as $img)
        <div class="col-md-4 mb-4">
            <img src="{{ $img['img'] }}" alt="Project 1" class="img-fluid">
            <h4>{{ $img['title'] }}</h4>
            <p>{{ $img['text'] }}</p>
        </div>
        @endforeach
    </div>
</div>