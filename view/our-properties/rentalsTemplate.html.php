<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LISTING SIZE INSTANCES* */
$listing_size_id = listingSizeTableClass::ID;
$listing_size_description = listingSizeTableClass::DESCRIPTION_LISTING_SIZE;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="rentals" class="properties">
    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Our Rental Properties</h2>
            </div>
        </div>
    </div>
    <div id="search" class="cell">
        <form data-abide="" novalidate="">
            <div class="grid-container">
                <div class="first row" style="margin-left: 15px;">
                    <div class="small-12 mlarge-4 columns" id="keywords" style="padding: 0;">
                        <div class="row">
                            <div class="small-10 medium-2 mlarge-3 input-group columns" style="padding-right: 1px !important;">
                                <label class="input-group-label" for="keywords">keywords</label>
                            </div>
                            <div class="small-12 medium-9 mlarge-7 input-group columns" style="padding-left: 1px !important; margin-left: 2px;">
                                <input aria-describedby="keywords" class="input-group-field" id="keywords" type="text"> <button class="input-group-button clear">x</button>
                            </div>
                        </div>
                    </div>
                    <div class="small-12 mlarge-4 columns" id="price">
                        <div class="row">
                            <div class="small-10 medium-2 mlarge-3 input-group columns" style="padding-left: 0;">
                                <label class="input-group-label" for="price-from">price range</label>
                            </div>
                            <div class="small-12 medium-4 mlarge-4 input-group columns" style="padding-right: 2px !important;">
                                <input aria-describedby="priceFrom" class="input-group-field" id="price-from" pattern="number" type="text"><button class="input-group-button clear">x</button>
                            </div>
                            <div class="small-12 medium-1 mlarge-0 input-group columns" style="padding-left: 6px;">
                                <label class="input-group-label" for="price-to">to</label>
                            </div>
                            <div class="small-12 medium-4 mlarge-4 input-group columns" style="padding-left: 2px !important;">
                                <input aria-describedby="priceTo" class="input-group-field" id="price-to" pattern="number" type="text"> <button class="input-group-button clear">x</button>
                            </div>
                        </div>
                    </div>
                    <div class="small-12 mlarge-4 columns" id="beds">
                        <div class="row">
                            <div class="small-1 medium-0 mlarge-0 columns beds" style="padding: 0; margin-right: 10px;">
                                <label for="beds-from" style="margin-top: 5px;">beds</label>
                            </div>
                            <div class=" small-12 medium-2 mlarge-4 columns beds" style="padding: 3px;">
                                <select id="" name="" class="form-control" style="width: 100%; margin-top: -3px;">
                                    <option value="">Select Size </option>
                                    <option value=""> Any </option>
                                    <option value="1">Studio</option>
                                    <option value="2">Junior 1BR</option>
                                    <option value="3">1BR</option>
                                    <option value="4">Convert 2BR</option>
                                    <option value="5">2BR</option>
                                    <option value="6">Convert 3BR</option>
                                    <option value="7">Convert 4BR</option>
                                    <option value="8">4BR</option>
                                    <option value="9">5 Plus</option>
                                    <option value="10">Loft</option>
                                    <option value="11">3BR</option>
                                  </select>
                            </div>
                            <div class="small-1  medium-1 mlarge-0 columns" style="padding: 0;">
                                <label for="beds-to" style="width: 10px; margin-top: 5px; padding-left: 4px;">to</label>
                            </div>
                            <div class="small-12  medium-2 mlarge-4 columns" style="padding:  0;">
                                <select id="" name="" class="form-control" style="width: 100%;">
                                    <option value="">Select Size </option>
                                    <option value=""> Any </option>
                                    <option value="1">Studio</option>
                                    <option value="2">Junior 1BR</option>
                                    <option value="3">1BR</option>
                                    <option value="4">Convert 2BR</option>
                                    <option value="5">2BR</option>
                                    <option value="6">Convert 3BR</option>
                                    <option value="7">Convert 4BR</option>
                                    <option value="8">4BR</option>
                                    <option value="9">5 Plus</option>
                                    <option value="10">Loft</option>
                                    <option value="11">3BR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="more" data-toggler data-animate="fade-in fade-out">
                    <div class="second row">
                        <div class="small-12 mlarge-2 columns">
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
                        <!-- <div class="small-12 mlarge-3 columns">
                            <select id="" name="" class="form-control" style="background-color: #505050; color: white; font-family: Roboto, sans-serif; font-weight: bold; text-transform: uppercase;" >
                                <option value="">Building Type<i aria-hidden="true" class="fa fa-chevron-down"></i></option>
                                <option value="">Any</option>
                                <?php
                                foreach ($objBuildingType as $buildingType):
                                  if ($buildingType->id_building_type != 6) {
                                    ?>
                                    <option value="<?php echo $buildingType->id_building_type ?>"><?php echo $buildingType->description_building_type; ?></option>
    <?php
  }
endforeach;
?>
                            </select> -->
                            <div class="small-12 mlarge-3 columns">
                                <button class="search-dropdown" data-toggle="building-type" type="button">BUILDING type<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                                <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="building-type">
                                    <form>
                                        <ul>
                                            <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>HIGHRISE</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>MIDRISE</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>LOWRISE</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>BROWNSTONE</label><input type="checkbox"><span class="checkbox"></span></li>
                                            <li><label>LOFT</label><input type="checkbox"><span class="checkbox"></span></li>
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
                        <div class="small-12 mlarge-1 columns" style="padding: 0;">
                          <button class="search-dropdown" data-toggle="pets" type="button" style="width: 110px;">PETS<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                          <div class="dropdown-pane small" data-auto-focus="true" data-dropdown="" id="pets">
                              <form>
                                  <ul>
                                      <li><label>any</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>PETS ALLOWED</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>CASE BY CASE</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>NO PETS</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>NO DOGS</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>NO CATS</label><input type="checkbox"><span class="checkbox"></span></li>
                                      <li><label>NOT SPECIFIED</label><input type="checkbox"><span class="checkbox"></span></li>
                                  </ul>
                              </form>
                          </div>
                            <!-- <select id="" name="" class="form-control" style="width: 80px; background-color: #505050; color: white; font-family: Roboto, sans-serif; font-weight: bold; text-transform: uppercase;" >
                                <option value="">Pets</option>
                                <option value=""> Any</option>
<?php foreach ($objPetsPolicy as $petspolicy): ?>
                                  <option value="<?php echo $petspolicy->id_pets_case ?>"><?php echo $petspolicy->description_pets_case; ?></option>
<?php endforeach; ?>
                            </select> -->

                        </div>
                    </div>
                    </div>
                    <div class="third row" style="position: relative;">
                        <div class="mlarge-3 mlarge-offset-2 columns desktop" style="margin-left: -25px;">
                            <button class="search-dropdown" data-toggle="search-map" type="button">search by map<i aria-hidden="true" class="fa fa-chevron-down"></i></button>
                        </div>
                        <div class="small-5 mlarge-3 columns" id="open-house">
                            <label style="margin-top: 4px;">Open House</label><input type="checkbox" style="margin-top: 4px;"><span class="checkbox" style="margin-top: 5px;"></span>
                        </div>
                        <div class="small-5 mlarge-3 columns" id="no-fee">
                            <label style="margin-top: 4px;">No Fee</label><input type="checkbox" style="margin-top: 4px;"><span class="checkbox" style="margin-top: 5px;"></span>
                        </div>
                        <div class="columns row mlarge-3">
                            <button id="rental-search-button" class="button success " style="color: #fff; padding-top: 6px !important; padding-bottom: 6px !important; position: absolute; width: 20%; right: 45px;" type="submit" > SEARCH </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns row mobile">
                <button data-toggle="more" class="options button white-button"><i class="fa fa-plus" aria-hidden="true"></i>MORE OPTIONS</button>
            </div></br>
            <div class="columns row mlarge-3">
                <button id="mobile-rental-search-button" class="button success " style="color: #fff;" type="submit" > SEARCH </button>
            </div>
        </form>
    </div>
    <div class="orbit" role="region" aria-label="Sales" data-auto-play="false" data-orbit>
        <div class="grid-container orbit-wrapper">
            <ul class="orbit-container">

                <li class="is-active orbit-slide">

                    <div class="row" data-equalizer="">
                        <div class="small-12 mlarge-3 columns card property">
                            <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                            <div class="column row card-divider property-img">
                                <img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg") ?>">
                                <h5>$2,200</h5>
                            </div>
                            <div class="column row card-section property-info">
                                <h6>Studio on Central Park</h6>
                                <div data-equalizer-watch="">
                                    <p>Upper West Side</p>
                                    <p>STUDIO | 1 BATH</p>
                                    <p>Amenities: <span class="no-fee">no fee</span>, Pets OK, Dishwasher, <a class="more" href="#">More</a></p>
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
            </div>



        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>
