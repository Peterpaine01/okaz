<?php

function getListings(): array
{
    return [
        ["title" => "Test 1", "price" => 30, "image" => "meuble-occasion-prix-critere.jpg", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo tortor, rhoncus malesuada volutpat at, ullamcorper vitae dui. Sed nec lacus mauris. Phasellus eget eleifend purus. Duis eros enim, pulvinar ut justo et, sagittis dignissim enim. Donec rhoncus, arcu at tempus accumsan, nisi risus condimentum risus, ac cursus libero ante at enim. In finibus tortor lorem, accumsan egestas turpis dapibus in. Praesent a erat vel ligula semper mattis."],
        ["title" => "Test 2", "price" => 28, "image" => "meuble-occasion-prix-critere.jpg", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo tortor, rhoncus malesuada volutpat at, ullamcorper vitae dui. Sed nec lacus mauris. Phasellus eget eleifend purus. Duis eros enim, pulvinar ut justo et, sagittis dignissim enim. Donec rhoncus, arcu at tempus accumsan, nisi risus condimentum risus, ac cursus libero ante at enim. In finibus tortor lorem, accumsan egestas turpis dapibus in. Praesent a erat vel ligula semper mattis."],
        ["title" => "Test 3", "price" => 47, "image" => "meuble-occasion-prix-critere.jpg", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo tortor, rhoncus malesuada volutpat at, ullamcorper vitae dui. Sed nec lacus mauris. Phasellus eget eleifend purus. Duis eros enim, pulvinar ut justo et, sagittis dignissim enim. Donec rhoncus, arcu at tempus accumsan, nisi risus condimentum risus, ac cursus libero ante at enim. In finibus tortor lorem, accumsan egestas turpis dapibus in. Praesent a erat vel ligula semper mattis."],
      ];
}

function getListingById(int $id): array
{ 
    $listings = getListings();
    return $listings[$id];
}