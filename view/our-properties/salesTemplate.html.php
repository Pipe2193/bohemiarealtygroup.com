<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="sales" class="properties">
    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Our Sales Properties</h2>
            </div> 
        </div>
    </div>
    <div id="search" class="cell">
        <form data-abide="" novalidate="">
            <div class="grid-container">
                <div class="first row">
                    <div class="small-12 mlarge-4 columns" id="keywords">
                        <div class="row">
                            <div class="small-3 mlarge-3 input-group columns">
                                <label class="input-group-label" for="keywords">keywords</label>
                            </div>
                            <div class="small-9 mlarge-9 input-group columns">
                                <input aria-describedby="keywords" class="input-group-field" id="keywords" type="text"> <button class="input-group-button clear">x</button>
                            </div>
                        </div>
                    </div>
                    <div class="small-12 mlarge-5 columns" id="price">
                        <div class="row">
                            <div class="small-3 mlarge-3 input-group columns">
                                <label class="input-group-label" for="price-from">price range</label>
                            </div>
                            <div class="small-4 mlarge-4 input-group columns">
                                <input aria-describedby="priceFrom" class="input-group-field" id="price-from" pattern="number" type="text"><button class="input-group-button clear">x</button> 
                            </div>
                            <div class="small-1 mlarge-1 input-group columns">
                                <label class="input-group-label" for="price-to">to</label> 
                            </div>
                            <div class="small-4 mlarge-4 input-group columns">
                                <input aria-describedby="priceTo" class="input-group-field" id="price-to" pattern="number" type="text"> <button class="input-group-button clear">x</button>
                            </div>
                        </div>
                    </div>
                    <div class="small-12 mlarge-3 columns" id="beds">
                        <div class="row">
                            <div class="small-3 mlarge-2 columns beds">
                                <label for="beds-from">beds</label>
                            </div>
                            <div class="small-4 mlarge-4 columns beds">
                                <button class="search-dropdown" data-toggle="beds-from" type="button"><i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                                <div class="dropdown-pane small" data-alignment="right" data-auto-focus="true" data-dropdown="" data-position="bottom" id="beds-from">
                                    <form>
                                        <ul>
                                            <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Studio</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Junior 1 BR</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>1 BedRoom</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Covert 2 BR</label><input type="checkbox"><span class="checkbox"></span></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="small-1 mlarge-2 columns"><label for="beds-to">to</label></div>
                            <div class="small-4 mlarge-4 columns">
                                <button class="search-dropdown" data-toggle="beds-to" type="button"><i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                                <div class="dropdown-pane small" data-alignment="right" data-auto-focus="true" data-dropdown="" data-position="bottom" id="beds-to">
                                    <form>
                                        <ul>
                                            <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Studio</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Junior 1 BR</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>1 BedRoom</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>Covert 2 BR</label><input type="checkbox"><span class="checkbox"></span></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="more" data-toggler data-animate="fade-in fade-out">
                    <div class="second row">
                        <div class="small-12 mlarge-3 columns">
                            <button class="search-dropdown" data-toggle="neighborhoods" type="button">neighborhoods<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                            <div class="dropdown-pane" data-auto-focus="true" data-dropdown="" id="neighborhoods">
                                <div class="first row">
                                    <div class="small-12 mlarge-4 columns end">
                                        <form id="boroughs-list">
                                            <ul>
                                                <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                                <li><label>MANHATTAN</label><input type="checkbox"><span class="checkbox"></span></li>
                                                <li><label>BROOKLYN</label><input type="checkbox"><span class="checkbox"></span></li>
                                                <li><label>QUEENS</label><input type="checkbox"><span class="checkbox"></span></li>
                                                <li><label>BRONX</label><input type="checkbox"><span class="checkbox"></span></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <form class="neighborhoods-list">
                                    <div id="manhattan" class="borough">
                                        <div class="column row"><hr></div>
                                        <div class="second row">
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>All of manhattan</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Bronxdale</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Allerton</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Melrose</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Marble Hill</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Morris Heights</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Soundview</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Throngs Neck</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Tremont</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="brooklyn" class="borough">
                                        <div class="column row"><hr></div>
                                        <div class="second row">
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>All of Brooklyn</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Bronxdale</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Allerton</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Melrose</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Marble Hill</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Morris Heights</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Soundview</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Throngs Neck</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Tremont</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="queens" class="borough">
                                        <div class="column row"><hr></div>
                                        <div class="second row">
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>All of queens</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Bronxdale</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Allerton</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Melrose</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Marble Hill</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Morris Heights</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Soundview</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Throngs Neck</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Tremont</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bronx" class="borough">
                                        <div class="column row"><hr></div>
                                        <div class="second row">
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>All of The Bronx</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Bronxdale</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Allerton</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Melrose</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Marble Hill</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Morris Heights</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                            <div class="mlarge-4 columns">
                                                <ul>
                                                    <li><label>Soundview</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Throngs Neck</label><input type="checkbox"><span class="checkbox"></span></li>
                                                    <li><label>Tremont</label><input type="checkbox"><span class="checkbox"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column row">
                                        <input class="green-button" type="reset" value="CLEAR ALL">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns">
                            <button class="search-dropdown" data-toggle="building-type" type="button">BUILDING TYPE<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                            <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="building-type">
                                <form>
                                    <ul>
                                        <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>highrise</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>midrise</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>lowrise</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>brownstone</label><input type="checkbox"><span class="checkbox"></span></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns">
                            <button class="search-dropdown" data-toggle="building-feat" type="button">BUILDING feat<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                            <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="building-feat">
                                <form>
                                    <ul>
                                        <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>laundry</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>garden</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>pool</label><input type="checkbox"><span class="checkbox"></span></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="small-12 mlarge-2 columns">
                            <button class="search-dropdown" data-toggle="apartment-feat" type="button">apartment feat<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                            <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="apartment-feat">
                                <form>
                                    <ul>
                                        <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>dishwasher</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>balcony</label><input type="checkbox"><span class="checkbox"></span></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="small-12 mlarge-1 columns">
                            <button class="search-dropdown" data-toggle="pets" type="button">pets<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                            <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="pets">
                                <form>
                                    <ul>
                                        <li><label>ok</label><input type="checkbox"><span class="checkbox"></span></li>
                                        <li><label>not OK</label><input type="checkbox"><span class="checkbox"></span></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="third row">
                        <div class="mlarge-3 mlarge-offset-3 columns desktop">
                            <button class="search-dropdown" data-toggle="search-map" type="button">search by map<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                        </div>
                        <div class="small-5 mlarge-3 end columns" id="open-house">
                            <label>Open House</label><input type="checkbox"><span class="checkbox"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns row mobile">
                <button data-toggle="more" class="options button white-button"><i class="fa fa-plus" aria-hidden="true"></i>MORE OPTIONS</button>
            </div>
        </form>
    </div>  <div class="orbit" role="region" aria-label="Sales" data-auto-play="false" data-orbit>
        <div class="grid-container orbit-wrapper">
<!--            <ul class="orbit-container">
                <li class="is-active orbit-slide">
                    <div class="row" data-equalizer="">
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK, Dishwasher, <a class="more" href="#">More</a></p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer="">
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="orbit-slide">
                    <div class="row" data-equalizer="">
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK, Dishwasher, <a class="more" href="#">More</a></p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer="">
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="../assets/img/properties1.jpg">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: Pets OK</p>
                                </div>
                                <div>
                                    <p>Contact Agent:</p>
                                    <p></p>
                                    <p class="agent">Wesley Miller</p>
                                    <p></p>
                                    <p>828.776.2847</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="column row">
                <nav class="orbit-bullets desktop">
                    <ul aria-label="Pagination" class="pagination text-center" role="navigation">
                        <li class="disabled"><a aria-label="Previous page" class="orbit-previous" href="#0">PREV<span class="show-for-sr">page</span></a></li>
                        <li class="current"><span class="show-for-sr">You're on page</span><button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button></li>
                        <li>
                            <a aria-label="Page 2" href="#0"><button data-slide="1"><span class="show-for-sr">Second slide details.</span></button></a>
                        </li>
                        <li>
                            <a aria-label="Page 3" href="#0"><button data-slide="2"><span class="show-for-sr">Third slide details.</span></button></a>
                        </li>
                        <li>
                            <a aria-label="Next page" class="orbit-next" href="#0">NEXT<span class="show-for-sr">page</span></a>
                        </li>
                    </ul>
                    <p>PAGE 1 of 1</p>
                </nav>
                <a class="button white-button mobile" href="">See More Listings <i aria-hidden="true" class="fa fa-chevron-down"></i></a>
            </div>-->
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>