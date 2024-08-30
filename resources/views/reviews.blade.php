<?php

$reviews = [
    [
        "img" => "img/reviews/customer1.png",
        "name" => "John Doe",
        "say" => '"The ceramic products are amazing! They make my home feel cozier and more elegant."',
    ],
    [
        "img" => "img/reviews/customer2.png",
        "name" => "Jane Smith",
        "say" => '"The quality of the ceramics is exceptional. I purchased several products, and they are all stunning."',
    ],
    [
        "img" => "img/reviews/customer3.png",
        "name" => "Mary Johnson",
        "say" => '"The ceramic products from this store are unique and so beautiful. Highly recommended!"',
    ],
];

?>
<div class="reviews container section_padding">
    <h2 class="section_title">Customer Reviews</h2>
    <div class="row">
        @foreach ($reviews as $review)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $review['img'] }}" class="card-img-top" alt="Customer 1">
                <div class="card-body">
                    <p class="card-text">{{ $review['say'] }}</p>
                    <p class="card-text"><strong>{{ $review['name'] }}</strong></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>