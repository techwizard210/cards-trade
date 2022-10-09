@extends('user.layout.app')

@section('content')

<div class="sell_bnr">

    <div class="container-sell">

        <h2 class="text-center">Sell your gift cards for cash!</h2>

        <div class="sell_form_sec">

            <form class="sell_form" id="sell_form_id">

                <ul>

                    <li>

                        <div class="dropdown">

                            <a class="dropbtn merchant" href="javascript:void(0)">Enter a Merchant (e.g. Target)</a>

                            <div id="myDropdown" class="dropdown-content">

                                <div class="chosen-drop">

                                    <div class="chosen-search">

                                        <input type="text" id="myInput" onkeyup="filterFunction()">

                                    </div>

                                    <ol id="brandList">

                                        <li>Abercrombie</li>

                                        <li>Academy Sports + Outdoors</li>

                                        <li>Ace Hardware</li>

                                        <li>Adidas</li>

                                        <li>Advance Auto Parts</li>

                                        <li>Aeropostale</li>

                                        <li>Amazon</li>

                                        <li>AMC Theaters</li>

                                        <li>American Express</li>

                                        <li>Andiamo</li>

                                        <li>Ann Taylor</li>

                                        <li>Anthropologie</li>

                                        <li>Antonio's Cucina Italiana</li>

                                        <li>Apple</li>

                                        <li>Applebee's</li>

                                        <li>Arby's</li>

                                        <li>At Home</li>

                                        <li>Athleta</li>

                                        <li>Aubree's</li>

                                        <li>AutoZone</li>

                                        <li>Banana Republic</li>

                                        <li>Barnes & Noble</li>

                                        <li>Bass Pro Shops</li>

                                        <li>Bath & Body Works</li>

                                        <li>BD's Mongolian Grill</li>

                                        <li>Bed Bath & Beyond</li>

                                        <li>Belk</li>

                                        <li>Benihana</li>

                                        <li>Best Buy</li>

                                        <li>Best Western</li>

                                        <li>Big Boy</li>

                                        <li>Big Lots!</li>

                                        <li>Biggby Coffee</li>

                                        <li>Black Angus</li>

                                        <li>Bloomingdale's</li>

                                        <li>Bob Evans</li>

                                        <li>Boscovs</li>

                                        <li>BP</li>

                                        <li>Bravo! Cucina Italiana</li>

                                        <li>Brooks Brothers</li>

                                        <li>Buckle</li>

                                        <li>Buffalo Wild Wings</li>

                                        <li>Build-A-Bear</li>

                                        <li>Burger King</li>

                                        <li>Burlington Coat Factory</li>

                                        <li>Busch's</li>

                                        <li>Cabela's</li>

                                        <li>California Pizza Kitchen</li>

                                        <li>Carino's</li>

                                        <li>Carlyle Grill</li>

                                        <li>Carrabba's Italian Grill</li>

                                        <li>Carter's</li>

                                        <li>Cato</li>

                                        <li>Champs Sports</li>

                                        <li>Cheesecake Factory</li>

                                        <li>Chick-Fil-A</li>

                                        <li>Chico's</li>

                                        <li>Children's Place</li>

                                        <li>Chili's</li>

                                        <li>Chipotle</li>

                                        <li>Cinemark</li>

                                        <li>Circle K</li>

                                        <li>Citgo</li>

                                        <li>Citi Trends</li>

                                        <li>Claire's</li>

                                        <li>Coach</li>

                                        <li>Cold Stone Creamery</li>

                                        <li>Costco</li>

                                        <li>Cracker Barrel</li>

                                        <li>Crate & Barrel</li>

                                        <li>Culver's</li>

                                        <li>CVS</li>

                                        <li>Dairy Queen</li>

                                        <li>Darden</li>

                                        <li>Dave & Buster's</li>

                                        <li>Denny's</li>

                                        <li>Destination XL</li>

                                        <li>Detroit Tigers</li>

                                        <li>Detroit Zoo</li>

                                        <li>Dick's Sporting Goods</li>

                                        <li>Disney</li>

                                        <li>Dollar General</li>

                                        <li>Dollar Tree</li>

                                        <li>Domino's</li>

                                        <li>DSW</li>

                                        <li>Dunham's</li>

                                        <li>Dunkin' Donuts</li>

                                        <li>Ebay</li>

                                        <li>Eddie Bauer</li>

                                        <li>Einstein Bros Bagels</li>

                                        <li>Emagine Theaters</li>

                                        <li>Express</li>

                                        <li>Family Dollar</li>

                                        <li>Famous Footwear</li>

                                        <li>Fandango</li>

                                        <li>Five Below</li>

                                        <li>Five Guys</li>

                                        <li>Fleming's</li>

                                        <li>Food Lion</li>

                                        <li>Foot Locker</li>

                                        <li>Forever 21</li>

                                        <li>fye</li>

                                        <li>Gamestop</li>

                                        <li>Gap</li>

                                        <li>Generic</li>

                                        <li>GNC</li>

                                        <li>Godiva</li>

                                        <li>Goodrich Quality Theaters</li>

                                        <li>Google Play</li>

                                        <li>Guitar Center</li>

                                        <li>H&M</li>

                                        <li>Hallmark</li>

                                        <li>Harbor Freight</li>

                                        <li>Harley Davidson</li>

                                        <li>Hobby Lobby</li>

                                        <li>Hollister</li>

                                        <li>Home Depot eStore Credit</li>

                                        <li>Home Depot Gift Card</li>

                                        <li>Home Depot Merch Credit (No ID)</li>

                                        <li>Home Depot Merch Credit (Tied to ID)</li>

                                        <li>Homegoods</li>

                                        <li>Honeybaked</li>

                                        <li>Hooters</li>

                                        <li>Hot Topic</li>

                                        <li>Ichiban</li>

                                        <li>IHOP</li>

                                        <li>Ikea Gift Card</li>

                                        <li>Ikea Merchandise Credit</li>

                                        <li>iTunes</li>

                                        <li>J Alexander's</li>

                                        <li>J Crew</li>

                                        <li>J Jill</li>

                                        <li>JCPenney</li>

                                        <li>Jiffy Lube</li>

                                        <li>Jimmy John's</li>

                                        <li>JoAnn</li>

                                        <li>Jos A Bank</li>

                                        <li>Journeys</li>

                                        <li>K&G Fashion Super Store</li>

                                        <li>Kay Jewelers</li>

                                        <li>Kendra Scott</li>

                                        <li>KFC</li>

                                        <li>Kirkland's</li>

                                        <li>KMart</li>

                                        <li>Knight's</li>

                                        <li>Kohl's</li>

                                        <li>Kona Grill</li>

                                        <li>Kroger</li>

                                        <li>Lacoste</li>

                                        <li>Landry's</li>

                                        <li>Lands End</li>

                                        <li>Lane Bryant</li>

                                        <li>LaVida Massage</li>

                                        <li>Lewis Jewelers</li>

                                        <li>Lids</li>

                                        <li>Little Caesars</li>

                                        <li>LL Bean</li>

                                        <li>Loft</li>

                                        <li>Logan's Roadhouse</li>

                                        <li>Longhorn Steakhouse</li>

                                        <li>Lowe's Gift Card</li>

                                        <li>Lowe's Merch Credit (No ID)</li>

                                        <li>Lululemon</li>

                                        <li>M Den</li>

                                        <li>MAC</li>

                                        <li>Macaroni Grill</li>

                                        <li>Macy's</li>

                                        <li>Maggiano's</li>

                                        <li>Mainstreet Ventures</li>

                                        <li>Mancino's Pizza & Grinders</li>

                                        <li>Mani Osteria & Bar</li>

                                        <li>Marathon</li>

                                        <li>Marriott</li>

                                        <li>Marshalls</li>

                                        <li>Massage Envy</li>

                                        <li>Mastercard (mcgift)</li>

                                        <li>Mastercard (mybalancenow)</li>

                                        <li>Mastercard (mygiftcardsite)</li>

                                        <li>Mastercard (myprepaidbalance) Gift Card</li>

                                        <li>Mastercard (OneVanilla)</li>

                                        <li>Mastercard (prepaidgiftbalance)</li>

                                        <li>Mastercard (SecureSpend)</li>

                                        <li>Mastercard (Vanilla)</li>

                                        <li>Maurices</li>

                                        <li>McDonalds</li>

                                        <li>Mediterrano</li>

                                        <li>Meijer</li>

                                        <li>Men's Wearhouse</li>

                                        <li>Menards Gift Card</li>

                                        <li>Menards Rebate</li>

                                        <li>Menchie's</li>

                                        <li>Michael Kors</li>

                                        <li>Michaels</li>

                                        <li>Micro Center</li>

                                        <li>Miles of Golf</li>

                                        <li>Mobil</li>

                                        <li>movietickets.com</li>

                                        <li>Mt. Brighton</li>

                                        <li>Neiman Marcus</li>

                                        <li>New York & Company</li>

                                        <li>Nike</li>

                                        <li>Noodles & Company</li>

                                        <li>Nordstrom</li>

                                        <li>North Face</li>

                                        <li>O'Reilly Auto</li>

                                        <li>Office Depot</li>

                                        <li>OfficeMax</li>

                                        <li>Old Navy</li>

                                        <li>Olga's</li>

                                        <li>Olive Garden</li>

                                        <li>Ollie's Bargain Outlet</li>

                                        <li>On The Border</li>

                                        <li>Origins</li>

                                        <li>Orvis</li>

                                        <li>Outback</li>

                                        <li>Pacsun</li>

                                        <li>Palm Palace</li>

                                        <li>Panera</li>

                                        <li>Pebble Beach</li>

                                        <li>Pet Supplies Plus</li>

                                        <li>Petco</li>

                                        <li>PetSmart</li>

                                        <li>PF Chang's</li>

                                        <li>Pizza Hut</li>

                                        <li>Plum Market</li>

                                        <li>Potbelly</li>

                                        <li>Pottery Barn</li>

                                        <li>Publix</li>

                                        <li>Qdoba</li>

                                        <li>Rainbow Shops</li>

                                        <li>Red Lobster</li>

                                        <li>Red Robin</li>

                                        <li>Regal Entertainment Group</li>

                                        <li>REI</li>

                                        <li>Rite Aid</li>

                                        <li>Rocky Mountain Chocolate Factory</li>

                                        <li>Ruby Tuesday</li>

                                        <li>Rue 21</li>

                                        <li>Ruth's Chris Steakhouse</li>

                                        <li>Saks Fifth Avenue</li>

                                        <li>Sally Beauty Supply</li>

                                        <li>Save A Lot</li>

                                        <li>Sears</li>

                                        <li>Sephora</li>

                                        <li>Shell</li>

                                        <li>Sidetrack</li>

                                        <li>Smoothie King</li>

                                        <li>Soma</li>

                                        <li>Southwest</li>

                                        <li>Spafinder.com</li>

                                        <li>Speedway Food and Merch</li>

                                        <li>Speedway Fuel</li>

                                        <li>Spencer's Gifts</li>

                                        <li>Staples</li>

                                        <li>Starbucks</li>

                                        <li>Steak N Shake</li>

                                        <li>Subway</li>

                                        <li>Sunglass Hut</li>

                                        <li>Sunoco</li>

                                        <li>Taco Bell</li>

                                        <li>Talbots</li>

                                        <li>Target Gift Card</li>

                                        <li>Test</li>

                                        <li>Texas Roadhouse</li>

                                        <li>TGI Friday's</li>

                                        <li>Ticketmaster</li>

                                        <li>Tiffany</li>

                                        <li>Tim Hortons</li>

                                        <li>TJ Maxx Gift Card</li>

                                        <li>TJ Maxx Merchandise Credit</li>

                                        <li>Tommy Hilfiger</li>

                                        <li>Tractor Supply Company</li>

                                        <li>Trader Joe's</li>

                                        <li>Tropical Smoothie Cafe</li>

                                        <li>Ulta</li>

                                        <li>Under Armour</li>

                                        <li>Urban Outfitters</li>

                                        <li>Value World</li>

                                        <li>Vera Bradley</li>

                                        <li>Verizon</li>

                                        <li>Victoria's Secret</li>

                                        <li>Visa (giftcardmall)</li>

                                        <li>Visa (mybalancenow)</li>

                                        <li>Visa (mygiftcardsite)</li>

                                        <li>Visa (myprepaidbalance)</li>

                                        <li>Visa (OneVanilla)</li>

                                        <li>Visa (prepaidgiftbalance)</li>

                                        <li>Visa (SecureSpend)</li>

                                        <li>Visa (Simon)</li>

                                        <li>Visa (Vanilla)</li>

                                        <li>Visa (Walmart)</li>

                                        <li>Vitamin Shoppe</li>

                                        <li>Von Maur</li>

                                        <li>Walgreens</li>

                                        <li>Walking Company</li>

                                        <li>Walmart</li>

                                        <li>Weber's Inn</li>

                                        <li>Wendy's</li>

                                        <li>West Marine</li>

                                        <li>White House | Black Market</li>

                                        <li>Whole Foods</li>

                                        <li>Williams-Sonoma</li>

                                        <li>Windsor</li>

                                        <li>Wingstop</li>

                                        <li>Yankee Candle</li>

                                        <li>Zagg</li>

                                        <li>Zales</li>

                                        <li>Zappos</li>

                                        <li>Zingerman's</li>

                                        <li>Xbox Gift card </li>

                                        <li>Steam Gift card </li>


                                    </ol>

                                </div>

                            </div>

                        </div>

                    </li>

                    <li>

                        <input type="number" name="" placeholder="$ Balance" id="merchant_balance"

                               class="merchant_balance" required="required"/>

                        <input type="hidden" name="" value="" class="merchant_balance2"/>

                        <input type="hidden" name="" value="" class="merchant_balance3"/>

                    </li>

                    <li>

                        <!-- Trigger/Open The Find Offer Now Modal -->

                        <button id="openFindOrderModal" class="cstm-btn">Find Offer Now</button>

                    </li>

                </ul>

            </form>



        </div>

    </div>

</div>

<div class="video_sec text-center" style="display:none;">

    <h2>Click the Video Below for Help</h2>

    <img src="images/maxresdefault-500x500.jpg" alt=""/>

</div>

<div class="flag_sec bg-gray" style="margin-top: 30px;">
    <div class="container-fluid">
        <h2 class="text-center">We Accept Cards From These Countries.</h2>
        <div class="inr_flag_sec">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                    <img src="images/USA.jpg" alt="" />

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                    <img src="images/USA-1.jpg" alt="" />

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                    <img src="images/USA-2-1.jpg" alt="" />

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                    <img src="images/USA-3.jpg" alt="" />

                </div>

            </div>

        </div>
    </div>
</div>

<section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
    <div class="container-fluid py-4">

        <div class="row align-items-center">
            <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
                <div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
                    <div>
                        <img alt="" class="img-fluid" src="images/gfc-1536x1152.jpg">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="overflow-hidden mb-2">
                    <h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200"><strong class="font-weight-extra-bold">FASTEST </strong>SERVICE</h2>
                </div>
                <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">We provide fastest service and the best rates in the market for your gift cards. Contact us 24/7 to sell your gift cards online instantly.</p>
                <ul class="services_list">

                    <li><i class="fa fa-check"></i> We Accept All Major Gift Cards.</li>

                    <li><i class="fa fa-check"></i>  App/Zelle/ Venmo Ids Available.</li>

                    <li><i class="fa fa-check"></i> Get your payment instantly within 30min to 1 hour.</li>

                    <li><i class="fa fa-check"></i> Get money in BTC or Your local currency. We operate worldwide.</li>

                </ul>
            </div>
        </div>

    </div>
</section>

    <div class="form_sec" style="display:none;">

        <div class="form_container">

            <h2 class="text-center">Get best offer for your Gift Card.</h2>

            <form>

                <label>Gift Card Name <span class="required">*</span></label><br />

                <input type="text" name="" required="required" placeholder="Enter your gift card name" />

                <label>Amount <span class="required">*</span></label><br />

                <input type="text" name="" required="required" placeholder="Gift card denomination" />

                <label>Email <span class="required">*</span></label><br />

                <input type="email" name="" required="required" placeholder="Email Address" />

                <label>Phone <span class="required">*</span></label><br />

                <input type="number" name="" required="required" placeholder="Phone Number" />

                <input type="submiit" name="" value="Get Offer">

            </form>

        </div>

    </div>

    <div class="process">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 process_first">

                    <h3>VERY SIMPLE PROCESS</h3>

                    <h2>How it Works?</h2>

                    <p>We offer the fastest services in the market. Your payment will be transferred within 30Min-2hours(Depending on the card type) after the card is verified.</p>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 steps">

                    <p>Step 1: Contact Us <br />Contact us and One of our representative will assist you at the earliest.</p>

                    <p>Step 3: If you agree with our offer then our representative will ask you to share the card images, receipt, or the e-code. We will then verify the card balance. </p>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 steps steps2">

                    <p>Step 2: Share Card Details <br />Confirm the Gift Card name and the amount on the Card. Our representative will share the best offer for your card and the payment method by which you want us to pay.</p>

                    <p>Step 4: Payment Done <br />Once we verify the card we will transfer the payment through the payment method you want within 30 minutes. </p>

                </div>

            </div>

        </div>

    </div>

    {{-- <div class="whatsapp_sec text-center bg-primary">

        <a href="https://wa.me/+15083221918">Chat On Whatsapp</a>

    </div> --}}

    <div class="payment_processed text-center">

        <h2>PAYMENT PROCESSED IN BELOW CURRENCIES.</h2>

        <h3>BITCOIN/USD</h3>

    </div>

    <div class="pay bg-gray py-5">

        <div class="container">

            {{-- <h2 class="text-center text-primary">How Do we Pay?</h2>

            <p>Below are the payment methods through which we make payouts.</p>

            <ul class="pay_list">

                <li><i class="fa fa-dollar"></i> Cash App</li>

                <li><i class="fa fa-dollar"></i> Zelle</li>

                <li><i class="fa fa-dollar"></i> Paypal</li>

                <li><i class="fa fa-dollar"></i> Venmo</li>

                <li><i class="fa fa-dollar"></i> Apple Pay</li>

                <li><i class="fa fa-dollar"></i> Google Pay</li>

                <li><i class="fa fa-dollar"></i> Bank Transfer</li>

                <li><i class="fa fa-dollar"></i> Bitcoin Wallet</li>

                <li><i class="fa fa-dollar"></i> Xoom</li>

                <li><i class="fa fa-dollar"></i> Western Union</li>

                <li><i class="fa fa-dollar"></i> Moneygram</li>

            </ul>

            <p>Note: If you do not use any of the above mentioned payment methods then we can mail a check to your Address. Mailing charges will apply.</p> --}}

            <div class="text-center">

                <h3 class="text-primary ">High Price Cards (Physical with Receipt)</h3>

                <h4>Apple/ Vanilla Visa/ One Vanilla/ American Express/ Macy/ Sephora/ Target/ Steam/ Amazon/ Google Play/ Ebay / Best Buy/ Nordstorm/ FootLocker/ Saks 5th Ave/ JcPenny Sephora</h4>

                <p>Note: We Buy all major Gift Cards. Just Get in touch with us to get the best price. </p>

            </div>

        </div>

    </div>

    <div class="review">

        <div class="container">

            <h2 class="text-center">Customers reviews</h2>

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="customer">

                        <div class="customer_box text-center">

                            <p>There service is fantastic. Fast response and very good rate.</p>

                            <div class="customer_img">

                                <img src="images/su.jpg" alt="" />

                            </div>

                            <div class="customer_detail">

                                <h3>Adam Moore</h3>

                                <h4>Texas</h4>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="customer">

                        <div class="customer_box text-center">

                            <p>I wanted to sell my $500 apple gift card but was unable to find a buyer. This is the best place to sell your gift card. I got 85% of the value of my card. Thank you so much.</p>

                            <div class="customer_img">

                                <img src="images/wom.jpg" alt="" />

                            </div>

                            <div class="customer_detail">

                                <h3>Mila Kunis</h3>

                                <h4>Utah</h4>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="customer">
                    <div class="customer_box text-center">

                        <p>I sold my Ebay Gift card and the response time was fast and they sent the payment within 20 minutes to my cash app. I dint knew that this is possible. Highly recommended.</p>

                        <div class="customer_img">

                            <img src="images/ol.jpg" alt="" />

                        </div>

                        <div class="customer_detail">

                            <h3>Mike Sendler</h3>

                            <h4>Ohio</h4>

                        </div>

                    </div>
                    </div>

                </div>

            </div>

        </div>

    </div>



<!-- The Find Order Now Modal -->

<div id="findOrderModal" class="modal">



    <div class="modal-content">

        <span class="close">&times;</span>

        <div class="redeem_btn" style="display:none;">

            <div class="redeem_btn_loading btn-center" style="color: black;">

                <img src="images/loading1.gif" alt="" style="width: 52px;"/> We will give you best choises.

            </div>

            <ul>

                <form id="btnListFormSub" method="post" class="btn-list">

                    <h5>How Would You Like To Get Paid?</h5>

                    <input type="hidden" name="merchant_name" class="merchant_name"/>

                    <input type="hidden" name="price" class="merchant_price"/>

                    <li><input type="button" name="physical_check" value="Physical Check" class="redeem1" id="b1"

                               /></li>

                    <li><input type="button" title="Paypal Transfer is not offered for First Time customers" name="paypal" value="Paypal" class="paypalSub" id="b2_paypal"/></li>

                    <!---li class="hid-para" ><p>Paypal Transfer is not offered for First Time customers</p></li------------>

                    <li><input type="button" name="bitcoin" value="Bitcoin" class="redeem2" id="b3"/></li>

                </form>

            </ul>

        </div>

    </div>



</div>



@endsection
