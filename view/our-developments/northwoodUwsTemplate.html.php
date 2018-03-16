<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div class="hero cell">
    <img src="<?php echo routing::getInstance()->getUrlImg("homepage/the-leo.jpg") ?>" alt="The Leo" title="The Leo">
    <div class="grid-container">
        <div class="column row">
            <h2>Northwood UWS</h2>
        </div>
    </div>
</div>

<div class="development grid-container">
    <div class="row">
        <div class="small-12 mlarge-6 columns">
            <ul>
                <li><img src="<?php echo routing::getInstance()->getUrlImg("homepage/the-leo.jpg") ?>" alt="The Leo" title="The Leo"></li>
                <li><img src="<?php echo routing::getInstance()->getUrlImg("homepage/the-leo.jpg") ?>" alt="The Leo" title="The Leo"></li>
                <li><img src="<?php echo routing::getInstance()->getUrlImg("homepage/the-leo.jpg") ?>" alt="The Leo" title="The Leo"></li>
            </ul>
        </div>
        <div class="split small-12 mlarge-6 columns">
            <h6>Sugar Hill’s newest condo conversion at<br>427 West 154th Street</h6>
            <p>Set on a beautiful tree-lined block, this pre-war Neo-Renaissance structure was built in 1901. John P. Leo, the original developer and architect, made his mark on Upper Manhattan designing residential developments out of his Harlem office. We are thrilled to honor his namesake with these re-imagined residences.</p>
            <p>Sugar Hill, part of the Hamilton Heights district of Harlem, is home to historic mansions such as the Bailey, Benzinger and Fink Houses as well as the famed Morris-Jumel Mansion. Situated right by the C train and within proximity of the 1, B and D metro lines, The Leo defines ease of transport for uptown living.</p>
            <dl>
                <dt>Residence Finishes</dt>
                <dd>State of the Art Kitchen</dd>
                <dd>Heated Flooring (select units)</dd>
                <dd>Decorative Fireplace (select units)</dd>
                <dd>Abundant Closets</dd>
                <dd>In Unit Washer/Dryer</dd>
                <dd>Recessed Lighting</dd>
                <dd>Mini-Split HVAC Units Throughout</dd>
                <dd>Oak Driftwood Brushed Hardwood Flooring</dd>
            </dl>
            <dl>
                <dt>Residence Features</dt>
                <dd>Pre-War</dd>
                <dd>Voice Intercom</dd>
                <dd>Bicycle Room</dd>
                <dd>Private Storage</dd>
            </dl>
        </div>
    </div>
    <div class="column row">
        <h1>Availability</h1>
    </div>
    <div class="table desktop column row">
        <div class="table-header row">
            <div class="mlarge-1 columns">Bedrooms</div>
            <div class="mlarge-1 columns">Bathrooms</div>
            <div class="mlarge-1 columns">Unit</div>
            <div class="mlarge-2 columns">Apprx.<br>Interior Sq.<br>Ft.</div>
            <div class="mlarge-1 columns">Outdoor Space</div>
            <div class="mlarge-1 columns">Price</div>
            <div class="mlarge-1 columns">Projected<br>Mo.<br>Common<br>Charges</div>
            <div class="mlarge-1 columns">Projected<br>Mo. R.E.<br>Taxes</div>
            <div class="mlarge-1 columns">Status</div>
            <div class="mlarge-2 columns"></div>
        </div>
        <div class="table-content row">
            <div class="mlarge-1 columns">2</div>
            <div class="mlarge-1 columns">2</div>
            <div class="mlarge-1 columns">1</div>
            <div class="mlarge-2 columns">1600 Sq. Ft.</div>
            <div class="mlarge-1 columns">yes</div>
            <div class="mlarge-1 columns">$1,250,000</div>
            <div class="mlarge-1 columns">$943.01</div>
            <div class="mlarge-1 columns">$223.43</div>
            <div class="mlarge-1 columns">Available</div>
            <div class="mlarge-2 columns align-self-middle"><a href="" class="button">View Listing</a></div>
        </div>
        <div class="table-content row">
            <div class="small-1 columns">2</div>
            <div class="mlarge-1 columns">1</div>
            <div class="mlarge-1 columns">4</div>
            <div class="mlarge-2 columns">856 Sq. Ft.</div>
            <div class="mlarge-1 columns"></div>
            <div class="mlarge-1 columns">$650,000</div>
            <div class="mlarge-1 columns">$503.54</div>
            <div class="mlarge-1 columns">$119.30</div>
            <div class="mlarge-1 columns">Closed</div>
            <div class="mlarge-2 columns align-self-middle"><a href="" class="button">View Listing</a></div>
        </div>
    </div>
    <div class="table mobile column row">
        <div class="row">
            <div class="table-header small-6 columns">Bedrooms</div>
            <div class="table-content small-6 columns">2</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Bathrooms</div>
            <div class="table-content small-6 columns">2</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Unit</div>
            <div class="table-content small-6 columns">1</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Apprx. Interior Sq. Ft.</div>
            <div class="table-content small-6 columns">1600 Sq. Ft.</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Outdoor Space</div>
            <div class="table-content small-6 columns">yes</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Price</div>
            <div class="table-content small-6 columns">$1,250,000</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Projected Mo. Common Charges</div>
            <div class="table-content small-6 columns">$943.01</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Projected Mo. R.E. Taxes</div>
            <div class="table-content small-6 columns">$223.43</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Status</div>
            <div class="table-content small-6 columns">Available</div>
        </div>
        <div class="column row">
            <a href="" class="button">View Listing</a>
        </div>
    </div>
    <div class="table mobile column row">
        <div class="row">
            <div class="table-header small-6 columns">Bedrooms</div>
            <div class="table-content small-6 columns">2</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Bathrooms</div>
            <div class="table-content small-6 columns">1</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Unit</div>
            <div class="table-content small-6 columns">4</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Apprx. Interior Sq. Ft.</div>
            <div class="table-content small-6 columns">856 Sq. Ft.</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Outdoor Space</div>
            <div class="table-content small-6 columns"></div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Price</div>
            <div class="table-content small-6 columns">$650,000</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Projected Mo. Common Charges</div>
            <div class="table-content small-6 columns">$503.54</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Projected Mo. R.E. Taxes</div>
            <div class="table-content small-6 columns">$119.30</div>
        </div>
        <div class="row">
            <div class="table-header small-6 columns">Status</div>
            <div class="table-content small-6 columns">Closed</div>
        </div>
        <div class="column row">
            <a href="" class="button">View Listing</a>
        </div>
    </div>
    <div class="column row">
        <h1>Contact Northwood UWS sales team for more information:</h1>
    </div>
    <div class="row">
        <div class="small-12 mlarge-2 columns">
        </div>
        <div class="agent small-12 mlarge-4 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/beth-gittleman.jpg") ?>">
            <h2>Beth Gittleman</h2>
            <p>Licensed Real Estate Associate Broker</p>
            <p>Head of Sales</p>
            <p><a href="tel:646-408-7785">646.408.7785</a></p>
            <p><a href="mailto:Beth@BohemiaRealtyGroup.com">Beth@BohemiaRealtyGroup.com</a></p>
        </div>
        <div class="small-12 mlarge-1 columns">
        </div>
        <div class="agent small-12 mlarge-4 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/susan-molloy.jpg") ?>">
            <h2>Susan Molloy</h2>
            <p>Licensed Real Estate Salesperson</p>
            <p><a href="tel:917-592-4927">917.592.4927</a></p>
            <p><a href="mailto:Susan@BohemiaRealtyGroup.com">Susan@BohemiaRealtyGroup.com</a></p>
        </div>
        <div class="small-12 mlarge-1 columns">
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>