<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="our-neighborhoods">
    <div class="grid-container">
        <div class="column row desktop">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/our-neighborhoods-desktop.jpg") ?>" usemap="#neighborhoods-map" height="578" width="1140" alt="Our Neighborhoods" title="Our Neighborhoods">
            <map name="neighborhoods-map">
                <area target="" alt="Inwood" title="Inwood" href="/our-neighborhoods/inwood.html" coords="1036,1,1108,144" shape="rect">
                <area target="" alt="Fort George" title="Fort George" href="/our-neighborhoods/fort-george.html" coords="946,2,1031,1,1031,145,890,144,889,97,946,95" shape="poly">
                <area target="" alt="Hudson Heights" title="Hudson Heights" href="/our-neighborhoods/hudson-heights.html" coords="889,0,942,88" shape="rect">
                <area target="" alt="Washington Heights" title="Washington Heights" href="/our-neighborhoods/washington-heights.html" coords="671,164,671,3,881,0,883,146,705,143" shape="poly">
                <area target="" alt="Sugar Hill" title="Sugar Hill" href="/our-neighborhoods/sugar-hill.html" coords="580,99,663,167" shape="rect">
                <area target="" alt="Hamilton Heights" title="Hamilton Heights" href="/our-neighborhoods/hamilton-heights.html" coords="488,0,662,92" shape="rect">
                <area target="" alt="Harlem" title="Harlem" href="/our-neighborhoods/harlem.html" coords="654,175,550,235,235,234,236,130,383,127,385,100,573,101,574,173" shape="poly">
                <area target="" alt="Manhattanville" title="Manhattanville" href="/our-neighborhoods/manhattanville.html" coords="384,2,482,92" shape="rect">
                <area target="" alt="Morningside Heights" title="Morningside Heights" href="/our-neighborhoods/morningside-heights.html" coords="235,2,376,123" shape="rect">
                <area target="" alt="Manhattan Valley" title="Manhattan Valley" href="/our-neighborhoods/manhattan-valley.html" coords="101,47,227,141" shape="rect">
                <area target="" alt="Upper West Side" title="Upper West Side" href="/our-neighborhoods/upper-west-side.html" coords="227,4,228,45,95,45,93,140,1,139,3,2" shape="poly">
                <area target="" alt="Central Park" title="Central Park" href="/our-neighborhoods/central-park.html" coords="1,145,228,233" shape="rect">
                <area target="" alt="Spanish Harlem" title="Spanish Harlem" href="/our-neighborhoods/spanish-harlem.html" coords="101,243,281,242,282,422,101,380" shape="poly">
                <area target="" alt="East Harlem" title="East Harlem" href="/our-neighborhoods/east-harlem.html" coords="539,240,464,284,328,431,291,421,292,242" shape="poly">
            </map>
        </div>
        <div class="row mobile">
            <div class="small-6 columns">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/our-neighborhoods-mobile.jpg") ?>" alt="Our Neighborhoods" title="Our Neighborhoods">
            </div>
            <div class="small-6 columns">
                <h3><a href="/our-neighborhoods/inwood.html">Inwood</a></h3>
                <h3><a href="/our-neighborhoods/fort-george.html">Fort George</a></h3>
                <h3><a href="/our-neighborhoods/hudson-heights.html">Hudson Heights</a></h3>
                <h3><a href="/our-neighborhoods/washington-heights.html">Washington Heights</a></h3>
                <h3><a href="/our-neighborhoods/sugar-hill.html">Sugar Hill</a></h3>
                <h3><a href="/our-neighborhoods/hamilton-heights.html">Hamilton Heights</a></h3>
                <h3><a href="/our-neighborhoods/manhattanville.html">Manhattanville</a></h3>
                <h3><a href="/our-neighborhoods/harlem.html">Harlem</a></h3>
                <h3><a href="/our-neighborhoods/morningside-heights.html">Morningside Heights</a></h3>
                <h3><a href="/our-neighborhoods/east-harlem.html">East Harlem</a></h3>
                <h3><a href="/our-neighborhoods/spanish-harlem.html">Spanish Harlem</a></h3>
                <h3><a href="/our-neighborhoods/central-park.html">Central Park</a></h3>
                <h3><a href="/our-neighborhoods/manhattan-valley.html">Manhattan Valley</a></h3>
                <h3><a href="/our-neighborhoods/upper-west-side.html">Upper West Side</a></h3>
            </div>
        </div>
    </div>
    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Our Neighborhoods</h2>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="row">
            <div class="small-12 mlarge-7 columns">
                <p>Explore our featured neighborhoods by scrolling over the interactive map.</p>
            </div>
            <div class="small-12 mlarge-5 columns">
                <a href="<?php echo routing::getInstance()->getUrlWeb("blog", "index") ?>" class="button signup-success">Read Our Blog</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.3/js/imageMapResizer.min.js"></script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function () {
      imageMapResize();
  });
</script>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>