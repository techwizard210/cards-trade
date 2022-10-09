@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('title.terms_and_conditions') }}</li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.terms_and_conditions') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="big_title mb-3 mt-4">
            <h1 class="mb-0 text-uppercase" style="font-weight: 900; font-size: 45px;">ELEGANCE  {{ __('title.terms_and_conditions') }}</h1>
            <h3>{{ __('label.terms_of_use') }}</h3>
            <a class="buying_guide_continue" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}</a>
        </div>
        <div class="clear"></div>
        <div class="about_content about_content_2">
            <p>Four separate contracts are used by ELEGANCE. The terms of these contracts appear on this page.</p>
            <p>The first contract is the "Website Terms and Conditions". This contract applies to ALL users of the ELEGANCE website. If you use this website for any reason, you will be bound by the Website Terms and Conditions.</p>
            <p>The second contract is the "Terms and Conditions of Supply". This contract applies to EVERY purchase of goods from ELEGANCE. If you order any goods from ELEGANCE, you will be bound by the Terms and Conditions of Supply. In addition if you purchase prescription eyewear from ELEGANCE you will be bound by the “Additional Terms and Conditions for Prescription Eyewear”. The fourth contract is the “Terms and Conditions for Lens Scanner” If you use the “Lens Scanner” Feature then you will also be bound by the “terms and Conditions For the Lens Scanner feature. Please use the links below to review all of these terms and conditions:</p>
            <p><strong><a style="color: #f7941e;" href="#name01"> 1. Website Terms and Conditions </a></strong></p>
            <p><strong><a style="color: #f7941e;" href="#name02"> 2. Terms and Conditions of Supply </a></strong></p>
            <p> </p>
            <p><a name="name01"></a></p>
            <p><strong><u>1. Website Terms and Conditions</u></strong></p>
            <p>This Agreement is between you, the person accessing and/or using the ELEGANCE website ("You") and elegancelinsen.ch ("ELEGANCE").</p>
    <p>The website is owned and operated by ELEGANCE. Your access to and/or use of the website is subject to Your agreement to, and compliance with, these Terms of Use.</p>
    <p>BY ACCESSING, BROWSING, OR USING THE SITE, OR BY CLICKING TO AGREE TO THESE TERMS OF USE WHEN AND IF THAT OPTION IS MADE AVAILABLE TO YOU, YOU ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTAND, AND AGREE TO BE BOUND BY THESE TERMS OF USE AND WILL COMPLY WITH ALL APPLICABLE LAWS. IF YOU DO NOT AGREE THEN PLEASE DO NOT USE OR ACCESS THE SITE. WE WILL DETERMINE YOUR COMPLIANCE WITH THESE TERMS OF USE IN OUR SOLE DISCRETION AND OUR DECISION WILL BE FINAL AND BINDING. ELEGANCE may amend these Terms of Use from time to time, and will update these Terms of Use on the Site. Your continued use of the Site after such amendments will constitute acceptance of the amendments by You.</p>
    <p> </p>
    <p><strong>Who may use the Site?</strong></p>
    <p>The Site is for visitors who wish to find out more about ELEGANCE and for private consumers who wish to purchase ELEGANCE products using this Site. You should read these Terms of Use in conjunction with the Privacy Policy, which is incorporated in these Terms of Use by reference.</p>
    <p> </p>
    <p><strong>Your Right to Use the Site</strong></p>
    <p>Subject to these Terms of Use, ELEGANCE grants to you a limited, non-licensable, revocable, and non-exclusive license to access the Site for the purposes of viewing the website and making purchases on the Site. You may only use the Site for lawful purposes, and in a manner which does not infringe the rights of, or restrict or inhibit the use and enjoyment of the Site by, any third party. You must not interrupt, attempt to interrupt, or cause the interruption of the operation of the Site in any way.</p>
    <p>The terms of this license replace entirely any implied license terms that might otherwise apply to the Site. and ELEGANCE explicitly prohibits use of the Site in any manner other than as licensed in these Terms of Use.</p>
    <p>You are fully responsible for Your use of the Site. Any unauthorized use shall immediately terminate the limited license without notice. Unauthorized use shall include, but are not limited to, all the following: </p>
    <p> </p>
    <p><strong>You shall not:</strong></p>
    <p>a) License, sublicense, sell, resell, transfer, assign, distribute or otherwise commercially exploit or make available to any third-party the Site in any way;</p>
    <p>b) Modify or make derivative works based upon the Site;</p>
    <p>c) Create Internet "links" to the Site or "frame" or "mirror" any portion of the Site on any other server or wireless or Internet-based device without ELEGANCE's prior express written consent;</p>
    <p>d) Reverse engineer or access the Site in order to (a) build a competitive product, service, or website; (b) build a product using similar ideas, features, functions or graphics of the Site; or (c) copy any ideas, features, functions or graphics of the Site;</p>
    <p>e) Use the Site, or any portion of it, for any illegal or unauthorized purpose or in a manner that violates any applicable laws or the Terms of Use;</p>
    <p> </p>
    <p><strong>Intellectual Property Rights</strong></p>
    <p>All intellectual property rights in the Site or any of the Site's content (including all copyrights and trademarks) ("the Materials") are owned by, or licensed to, ELEGANCE or otherwise used by ELEGANCE as permitted by applicable law. The Materials may not be modified, translated, disassembled, reproduced, copied, or re-engineered for any commercial or public purpose, republished, posted, broadcast, distributed or transmitted by You, or provided by You to any third party without the express written consent of ELEGANCE. Nothing on the Website should be construed as granting You or any other person any right to use any Materials without the express written permission of ELEGANCE or the owner of the intellectual property rights in such Materials, except where you are expressly licensed to do so in accordance with these Terms of Use.</p>
    <p><a name="name03"></a> <strong> <u>3. Additional Terms of Use</u> </strong></p>
    <p>ELEGANCE may publish terms of use additional to (but not in substitution of) these Terms of Use. You agree to abide by all such additional terms of use as they may be updated from time to time. In case of differences or discrepancies between these Terms of Use and such additional terms of use, the latter shall prevail to the extent of any inconsistencies, and only in respect of the sections of the Site in respect of which those additional terms of use relate.</p>
    <p> </p>
    <p><strong>Accuracy of content</strong></p>
    <p>ELEGANCE will make reasonable efforts to verify and maintain the accuracy of any content of the Site, but ELEGANCE does not represent nor warrant that the content of the Site, including any pricing information on the Site, is or will be correct, up to date or error free.</p>
    <p>ELEGANCE reserves the right, at its sole discretion, to make improvements to, or correct any errors or omissions in any portion of the content and to make any other changes to the Site, materials, tools, products, services and prices displayed or described on the Site at any time, without notice.</p>
    <p>ELEGANCE does not represent nor warrant uninterrupted or error free use of the Site, that defects will be corrected, or that the Site or the server that makes it available or files available for downloading from the Internet are free of infection or viruses, worms, Trojan horses or other code that manifest contaminating or destructive properties. ELEGANCE does not assume any responsibility, liability, or risk for Your use of the Internet.</p>
    <p>All Information is provided on an "as-is" basis without any warranties of any kind, either express or implied.</p>
    <p> </p>
    <p><strong>Third Party Sites and Content</strong></p>
    <p>As a convenience to you, ELEGANCE may provide, on the Site, links to sites operated by other entities as well as network content provided, uploaded, published, or distributed by users and other participants in the Site ( "Third Party Content" ). If you use these sites, you will leave the Site. If you decide to visit any linked site or decide to use any of the Third Party Content, you do so at your own risk and it is your responsibility to review their terms of use and privacy policy and to take all protective measures to guard against viruses or other destructive elements. ELEGANCE is not a publisher of any such content. Such Third Party Content and all information contained on the linked sites contain the views, opinions, statements, offers, and other material of the respective users, participants or authors. ELEGANCE makes no warranty or representation regarding, and does not endorse, any linked sites, any Third Party Content or other information appearing thereon or any of the products or services described thereon. Neither the use of Third Party Content nor links imply that ELEGANCE, or any of the Site‘s sponsors, endorses, is affiliated or associated with, or is legally authorized to use any trademark, trade name, logo or copyright symbol displayed in or accessible through the links, or that any provider of Third Party Content or any linked site is authorized to use any trademark, trade name, logo, or copyright symbol of ELEGANCE or any of its affiliates or subsidiaries.</p>
    <p> </p>
    <p><strong>Linking to the Site</strong></p>
    <p>All links to the Site must be approved in writing by ELEGANCE prior to the creation of the link, except that ELEGANCE consents to links in which: (i) the link "points" the user directly to the home page only and not to pages accessible from the home page (ii) the link, when activated by a user, displays this page full-screen in a fully operable and navigable browser window and not within a "frame" on the linked site and (iii) the appearance, position, and other aspects of the link do not create the false appearance that an entity or its activities or products are associated with or sponsored by ELEGANCE nor damage or dilute the goodwill associated with the name and trademarks of ELEGANCE or its affiliates. ELEGANCE reserves the right to revoke this consent to link at any time at its sole discretion.</p>
    <p> </p>
    <p><strong>Requirements to Use the Site</strong></p>
    <p>In using the Site, You agree to all the following, without limitation:</p>
    <p>a) You accept and agree to these Terms of Use and the Privacy Policy.</p>
    <p>b) You will register an account with ELEGANCE on the Website or the Application, as needed.</p>
    <p>c) You agree to comply with all laws applicable to your use of the Site.</p>
    <p>d) You shall neither collect or harvest any personally identifiable information, including e-mail addresses from the Site.</p>
    <p>e) You shall not transmit any viruses, worms, defects, Trojan horses or other items of a destructive or damaging nature.</p>
    <p>f) You shall not use the Site to violate the security of any computer network, crack passwords or security encryption codes, transfer or store illegal material including those that are deemed threatening or obscene.</p>
    <p>g) You shall not use any device, software or routine that interferes with the functioning and integrity of the Site.</p>
    <p>h) You shall not use any device, software, or other instrumentality to disrupt, damage or interfere with or attempt to disrupt, damage or interfere with the functioning and integrity of the Site.</p>
    <p> </p>
    <p><strong>Indemnification</strong></p>
    <p>You represent and warrant that You are at least 18 years of age and/or that you possess the legal right and ability to obligate yourself to these Terms of Use. You represent and warrant that You will use this Site in accordance with these Terms of Use and all applicable laws.</p>
    <p>You agree to indemnify, defend, release and hold ELEGANCE, its owners, affiliates, business partners, directors, officers, managers, employees, agents, authorized representatives, and permitted successor and assigns (each an "<u>Indemnitee</u>," and collectively, the "<u>Indemnitees</u>") harmless from any loss, liability, claim, demand, action, harm, damage, injury, cost or expense (including, but not limited to, reasonable legal fees and court costs) asserted by any third-party relating in any way to Your use of the Site, your breach of the Terms of Use, or your violation of such third-party’s rights, including, but not limited to, any intellectual property rights.</p>
    <p>This <u>section </u>shall survive the termination of the Terms of Use.</p>
    <p> </p>
    <p><strong>Information You submit to the Site</strong></p>
    <p>All information ELEGANCE asks you to submit to the Site will be treated in accordance with its <a style="color: #ff9900;" href="https://en.ELEGANCE.ch/privacy">Privacy Policy</a>. Please note, ELEGANCE will fully cooperate with any law enforcement authorities or court orders requesting or directing it to disclose information (including personal data) that ELEGANCE have obtained through your use of the Site. All information you submit to the Site, whether solicited or unsolicited will not be regarded as confidential.</p>
    <p> </p>
    <p><strong>Limitation of Liability</strong></p>
    <p>For the avoidance of doubt, nothing in these Terms of Use shall affect any contract between you and ELEGANCE for the sale of goods. Other than the warranties and conditions expressly set forth in these Terms of Use and the warranties and conditions implied by relevant legislation, the exclusion of which from an agreement would contravene a statute or cause part or all of this clause to be void ("Non-excludable Conditions"), the parties agree to exclude all implied terms, conditions and warranties in relation to the Site.</p>
    <p>To the maximum extent permitted by law, ELEGANCE DISCLAIMS ALL IMPLIED REPRESENTATIONS AND WARRANTIES, INCLUDING, BUT NOT LIMITED TO: WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NON-INFRINGEMENT, FREEDOM FROM COMPUTER VIRUS STRAINS, AND IMPLIED WARRANTIES ARISING FROM COURSE OF DEALING OR COURSE OF PERFORMANCE.</p>
    <p>Except with respect to any Non-excludable Conditions and to the furthest extent permitted by the applicable law, ELEGANCE, its affiliates, licensors, service providers, content providers and their employees, agents, officers and directors will not be liable for any direct, indirect, consequential, punitive, or special loss or damage, and/or business interruption, or loss of profits, data, goodwill, information or programs or your information handling system, or for pain and suffering or emotional distress arising out of or in connection with the use of, or inability to use, the Site, its content, materials or functions, or any other loss or damage of any kind, whether in action of contract, negligence or other tortious action, or otherwise. With respect to breach of any Non-excludable Conditions by ELEGANCE (excluding non-excludable in respect of which liability may not be limited), ELEGANCE limits its liability to, to the furthest extent permitted by the applicable law at its option, where the breach relates to goods, repairing or replacing the goods, or where the breach relates to services, supplying the services again.</p>
    <p>NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED IN THESE TERMS, OUR LIABILITY TO YOU IN RESPECT OF ANY LOSS OR DAMAGE SUFFERED BY YOU AND ARISING OUT OF OR IN CONNECTION WITH THESE TERMS, WHETHER IN CONTRACT, TORT OR FOR BREACH OF STATUTORY DUTY OR IN ANY OTHER WAY SHALL NOT EXCEED $50.</p>
    <p>Nothing in this clause entitled “Limitation of Liability” purports to exclude any liability in relation to personal injury or death.</p>
    <p> </p>
    <p><strong>Changes to the Site</strong></p>
    <p>ELEGANCE may terminate, change, suspend or discontinue any aspect of the Site at any time. ELEGANCE may also impose limits on certain features and services and/or restrict access to parts or all of the Site without notice or liability. ELEGANCE reserve the right to terminate Your secure log-in and suspend Your access to secure areas of the Site upon becoming aware that You have breached these Terms of Use.</p>
    <p> </p>
    <p><strong>No Waiver</strong></p>
    <p>No waiver by ELEGANCE of any breach of any obligation arising under these Terms of Use shall constitute a waiver of any other breach and no failure to exercise or to partially exercise by ELEGANCE of any remedy shall constitute a waiver of the right subsequently to exercise that or any other remedy.</p>
    <p> </p>
    <p><strong>Governing Law and Jurisdiction</strong></p>
    <p>These Terms of Use shall be governed by and construed in accordance with the laws of Switzerland. The courts of Switzerland are to have exclusive jurisdiction to settle any disputes arising out of or in connection with the use of the Site.</p>
    <p> </p>
    <p><strong>Severability</strong></p>
    <p>If any of these Terms of Use should be determined to be illegal, invalid, or otherwise unenforceable by reason of the laws of any jurisdiction in which these Terms of Use are intended to be effective, then to the extent that, and within the jurisdiction which that Term is illegal, invalid or unenforceable, it shall be severed and deleted from these Terms of Use and the remaining Terms of Use shall survive, remain in full force and effect, and continue to be binding and enforceable.</p>
    <p><a name="name02"></a></p>
    <p><strong><u>2. Terms and Conditions of Supply</u></strong></p>
    <p>If You have difficulty reading this page, You must contact us before You place Your order. By placing an order with ELEGANCE, You will be deemed to have understood and accepted these terms and conditions ("Terms"). If You have any queries regarding these Terms (or the order form) please raise them with us as soon as possible and in any event before You place Your order.</p>
    <p>This Agreement is between You, the person placing an order for goods using the ELEGANCE website (“You”) and ELEGANCE.</p>
    <p>1.1 In these Terms:</p>
    <p>"Goods" means those products made available by ELEGANCE that You wish to purchase, as indicated in Your Order.</p>
    <p>"Order" means orders placed in accordance with the provisions of Section 3.1.</p>
    <p>"Site" means the website owned and operated by ELEGANCE with URL address <a href="https://elegancelinsen.ch">https://elegancelinsen.ch</a></p>
    <p> </p>
    <p><strong>2. Customer Obligations</strong></p>
    <p>2.1 By submitting Your Order You warrant, represent and undertake:</p>
    <p>2.1.1 that You are aged 18 or over and are not ordering on behalf of another person</p>
    <p>2.1.2 to provide any details reasonably requested by ELEGANCE to confirm that You are eligible to purchase the Goods</p>
    <p>2.1.3 that You are acting in Your capacity as an individual consumer and the Goods or any part of the Goods shall not be used for resale or for anything other than Your own personal use</p>
    <p>2.1.4 that You are the authorized holder of any credit/debit card You may use on the Site.</p>
    <p> </p>
    <p><strong>3. Orders for Goods</strong></p>
    <p>3.1 via the ordering system on the Site or</p>
    <p>3.2 Your submission of the Order, whether submitted via the Site or other represents an offer to purchase the Goods from ELEGANCE. ELEGANCE may confirm receipt of this offer via email (if the Order is placed via the Site) or via text message, if you have provided your mobile telephone number. For the avoidance of doubt, a confirmation of receipt of the Order does not indicate that ELEGANCE will supply any Goods to You.</p>
    <p>3.3 You may change Your Order within 24 hours of submission to the Site. Any change requested to an Order after this time may be rejected by ELEGANCE at its absolute discretion.</p>
    <p>3.4 ELEGANCE may communicate with you about your order via email or via text message. If the telephone number that you provide during the submission of your Order is a mobile telephone number, you agree to receive transactional text messages about your Order, including Order updates.</p>
    <p> </p>
    <p><strong>4. Limitations of Supply</strong></p>
    <p>4.1 ELEGANCE shall make reasonable efforts to meet the requirements You specify in Your Order(s), however We cannot guarantee the availability of Goods. If the Goods You have ordered cannot be supplied to You, ELEGANCE will contact You to give You a choice to receive a replacement or a refund. If ELEGANCE receives no response from You, ELEGANCE may, at its absolute discretion, provide replacement Goods of an equivalent quality and/or specification or cancel the Order and provide a refund.</p>
    <p>4.2 ELEGANCE tries to ensure that the Goods supplied match the descriptions provided on the Site or in our current mail order catalogue. Whilst ELEGANCE tries to ensure that there are no changes to the Goods to be supplied, You acknowledge that there may be some minor variations to the description and/or specification of the Goods which arise by virtue of changes made by the manufacturers of the parts supplied which form part of the Goods, and accept that such minor variations will not give You a right to refuse delivered Goods.</p>
    <p>4.3 ELEGANCE shall, on the advice of its supervising opticians, have absolute discretion as to whether or not to accept an Order.</p>
    <p> </p>
    <p><strong>5. Prices and Payment</strong></p>
    <p>5.1 Subject to Clause 5.3, the price payable by You for the Goods shall be the price stated on the Site or the current mail order catalogue at the time Your Order is placed in accordance with these Terms.</p>
    <p>5.2 Unless otherwise stated on the Site, all prices for Goods are in Swiss Francs.</p>
    <p>5.3 While ELEGANCE uses reasonable endeavours to ensure the accuracy of the prices and price related information stated in its catalogue and on the Site, we do not warrant that the Site is error-free, or that You will not encounter a mispriced item in the catalogue or on the Site. If an item is mispriced or if the price has changed since the last catalogue was issued, ELEGANCE will contact You and give You the choice to place an Order for the Goods at the correct price or to cancel the Order and receive a refund of any money paid by You.</p>
    <p>5.4 The postage, packaging and delivery charges for all purchases are given on our Site and in our mail order catalogue.</p>
    <p> </p>
    <p><strong>6. Delivery and Carriage</strong></p>
    <p>6.1 Delivery of the Goods shall be deemed to take place at the time the Goods first arrive at the delivery address stated on Your Order.</p>
    <p> </p>
    <p><strong>7. Goods that are Defective on Delivery</strong></p>
    <p>The rights granted to You under this clause are in addition to, and do not replace, any rights You may have as a consumer under relevant laws, including any consumer protection legislation applicable to Your purchase of the Goods</p>
    <p>7.1 Upon delivery of the Goods You must inspect them carefully. If any of the Goods do not match the description (subject to clause 4.2) or appear to be damaged or are missing, do not use the Goods or any items accompanying the Goods, and please contact ELEGANCE by email and inform us of the problem within 5 days of delivery of the Goods. If ELEGANCE (acting reasonably) accepts that the Goods do not match the description, or are damaged or missing, the Goods will be deemed "Defective on Delivery".</p>
    <p>7.2 You must notify ELEGANCE immediately if there are any defects in the Goods which are apparent during Your use of the Goods. Provided You advise ELEGANCE within 14 days of delivery of the defect, the Goods will be deemed "Defective on Delivery".</p>
    <p>7.3 If the Goods are Defective on Delivery, ELEGANCE will, at ELEGANCE’ sole discretion, either repair or replace such Goods or refund the price paid for the Goods to You.</p>
    <p>7.4 If the Goods are Defective on Delivery, You agree to return the Goods to ELEGANCE in substantially the same condition as when received by You, including all items and packaging accompanying the Goods.</p>
    <p>7.5 Subject to Clause 7.6, ELEGANCE shall pay the costs of postage, packing and delivery in relation to the repair or replacement of any Goods that are Defective on Delivery and shall, upon written request, reimburse You the reasonable costs of returning the defective Goods.</p>
    <p>7.6 You will be liable for all costs connected with the supply of replacement Goods (including posting, packing and delivery) until the returned Goods are received by ELEGANCE.</p>
    <p> </p>
    <p><strong>8. Manufacturing defects in Goods</strong></p>
    <p>The rights granted to You under this clause are in addition to, and do not replace, any rights You may have as a consumer under relevant laws, including any consumer protection legislation applicable to Your purchase of the Goods.</p>
    <p>8.1 If You discover a manufacturing defect within twelve months of delivery of any Goods, You must notify ELEGANCE immediately.</p>
    <p>8.1.1 If You return the defective Goods stating the manufacturing defect to ELEGANCE, ELEGANCE shall subject to Clause 8.1.2 at its absolute discretion repair or replace such Goods.</p>
    <p>8.1.2. ELEGANCE shall not repair or replace any Goods if (i) it has not received the defective Goods back from You or (ii) if the defect was caused by misuse or mistreatment of the Goods.</p>
    <p>8.1.3. ELEGANCE shall pay the costs of the return postage, packing and delivery in relation to the repair or replacement of any Goods returned as a result of a manufacturing defect and shall, upon written request, reimburse You the reasonable cost of returning the defective Goods.</p>
    <p> </p>
    <p><strong>9. Transfer of Risk and Title in Goods</strong></p>
    <p>9.1 Subject to Clause 7, title in the Goods shall pass to You when the Goods are dispatched from our warehouse to be delivered to the delivery address set out in Your Order provided that ELEGANCE has received payment in full for the Goods.</p>
    <p>9.2 Subject to Clause 7, risk in the Goods shall pass to You when the Goods are dispatched from our warehouse to be delivered to the delivery address set out in Your Order.</p>
    <p>9.3 In the event of cancellation, risk in the Goods remains with You until the Goods are received by ELEGANCE.</p>
    <p> </p>
    <p><strong>10. Liability</strong></p>
    <p>10.1 Nothing in this Agreement shall exclude or limit either party's liability for death or personal injury resulting from that party's negligence or for fraud or for any other liability that cannot by law be excluded or limited, including liability that cannot be excluded or limited by any consumer protection legislation applicable to Your purchase of the Goods.</p>
    <p>10.2 Subject to Clauses 10.1, the total liability of ELEGANCE to You in respect of all claims arising out of or in connection with an Order, whether in contract, tort (including negligence or breach of statutory duty), misrepresentation or otherwise, shall not exceed the total sums received by ELEGANCE for the Goods to which the Order relates.</p>
    <p>10.3 Subject to Clause 10.1, ELEGANCE shall not be liable to You for any loss of contracts, loss of income or revenue, loss of profits, loss of goodwill or loss of insurance cover.</p>
    <p>10.4 Subject to Clause 10.1, ELEGANCE shall not be liable to You for any consequential, special, punitive or indirect losses or damages of any kind arising out of or in connection with this Agreement however caused and whether arising under contract, tort, negligence, misrepresentation or otherwise. This exclusion shall apply even if ELEGANCE has been advised of the possibility of such loss or damage.</p>
    <p>10.5 Subject to Clause 10.1 ELEGANCE shall not be liable to You where the loss or damage results from information provided by You that is inaccurate, false or misleading or that otherwise results from a breach by You of these Terms.</p>
    <p>10.6 Subject to Clause 10.1, ELEGANCE accepts no liability in respect of any non-standard use of the Goods such as, by way of example only, in extreme sports.</p>
    <p>10.7 Before starting to use your eyewear purchase you should try them on. If you cannot see clearly or if you experience any discomfort or problem in relation to any eyewear product (particularly prescription eyewear and contact lenses) purchased, you should stop using the eyewear in question immediately and you should seek advice from an appropriate medical practitioner without delay, which may include an ophthalmologist, optician or eye doctor. Unless specified otherwise, the sale and supply of products to you by ELEGANCE does not and cannot constitute the provision of any advice whether of a professional or medical nature or otherwise.</p>
    <p>NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED IN THESE TERMS, OUR LIABILITY TO YOU (OTHER THAN IN RELATION TO THE GOODS) IN RESPECT OF ANY LOSS OR DAMAGE SUFFERED BY YOU AND ARISING OUT OF OR IN CONNECTION WITH THESE TERMS, WHETHER IN CONTRACT, TORT OR FOR BREACH OF STATUTORY DUTY OR IN ANY OTHER WAY SHALL NOT EXCEED $50.</p>
    <p> </p>
    <p><strong>11. Indemnification</strong></p>
    <p>You agree to indemnify, defend, release and hold ELEGANCE, its owners, affiliates, business partners, directors, officers, managers, employees, agents, authorized representatives, and permitted successor and assigns (each an "<u>Indemnitee</u>," and collectively, the "<u>Indemnitees</u>") harmless from any loss, liability, claim, demand, action, harm, damage, injury, cost or expense (including, but not limited to, reasonable legal fees and court costs) asserted by any third-party relating in any way to Your use of the Goods, Your breach of any applicable law, Your breach of these terms and conditions, or Your violation of such third-party’s rights, including, but not limited to, any intellectual property rights.</p>
    <p>This <u>Section 11</u> shall survive the termination or fulfillment of any Order.</p>
    <p> </p>
    <p><strong>12. Force Majeure</strong></p>
    <p>YOU AGREE THAT ELEGANCE SHALL NOT BE RESPONSIBLE FOR ANY DELAY, FAILURE TO DELIVER, FAILURE IN PERFORMANCE OR INTERRUPTION OF SERVICE, RESULTING DIRECTLY OR INDIRECTLY: (A) FROM ACTS OF GOD, ACTS OF ANY GOVERNMENTAL AGENCY, NATURAL DISASTERS, ACTS OF WAR, INSURRECTION OR TERRORISM, STRIKES OR LOCKOUTS, UNAUTHORIZED NETWORK OR COMPUTER INTRUSION, OR INTERNET- OR COMPUTER-RELATED VIRUSES, HACKER ATTACKS OR OTHER AGENTS INTRODUCED BY A THIRD PARTY, FAILURE OF THE INTERNET AND OTHER CONDITIONS BEYOND OUR CONTROL, (B) SOLELY FROM ANY TECHNICAL REQUIREMENT FOR WHICH YOU ARE RESPONSIBLE, OR (C) SOLELY FROM YOUR INTENTIONAL ACTS OR OMISSIONS.</p>
    <p> </p>
    <p><strong>13. Notices</strong></p>
    <p>Any notice or other communication to be given under these Terms must be in writing, in the case of notices to ELEGANCE, in the case of notices to You, by pre-paid post or email to the address or other contact address set out in Your Order. Any notice or document shall be deemed received, if posted, two working days after posting and, if sent by email, at the time of transmission, provided no transmission failure notice is received.</p>
    <p> </p>
    <p><strong>14. General Provisions</strong></p>
    <p>14.1 In the interpretation of these Terms:</p>
    <p>14.1.1 the headings are for convenience only and shall not affect the interpretation of this Agreement and</p>
    <p>14.1.2 "including" means including without limitation and includes shall be construed accordingly.</p>
    <p>14.2 You may not assign, sub-contract, sub-license or otherwise transfer in whole or in part any of Your rights or obligations under this Agreement.</p>
    <p>14.3 These Terms incorporate by reference the following additional terms: a) ELEGANCE "100% Guarantee", as published on the Site, b) if the Goods include any item manufactured in accordance with a prescription from registered medical practitioner or optometrist, the "Additional Terms and Conditions for Prescription Eyewear".</p>
    <p>14.4 These Terms and any relevant Order accepted by ELEGANCE constitute the entire agreement between the parties and supersede any prior written or oral agreements, statements, promises or representations made in relation to the subject matter of such Order (including all other information on the Site and/or contained in ELEGANCE catalogue and sales literature) and, subject always to the statutory rights afforded to You as a consumer, each party acknowledges that (save in the case of a fraudulent misrepresentation by the other party) it shall not have any remedy in respect of any representation or term not set out in these Terms or any relevant Order accepted by ELEGANCE. None of our representatives, agents or sales persons have authority to vary, amend, or waive any of these Terms on behalf of ELEGANCE and no variation, amendment or waiver of these Terms by such persons shall have effect unless expressly agreed to by an authorised representative of ELEGANCE with You in writing.</p>
    <p>14.5 Failure by either party to assert its rights in relation to any breach of these Terms or any relevant Order on any occasion shall not be deemed a waiver of such rights.</p>
    <p>14.6 If any provision of these Terms and any relevant Order is found to be unenforceable, the remaining provisions shall continue in force subject to such modification as may be necessary to achieve as nearly as possible the objectives of these Terms.</p>
    <p>14.7 These Terms and any relevant Order are governed by the laws of Switzerland. and the parties hereby submit to the exclusive jurisdiction of the courts of Switzerland in relation to any dispute arising out of them.</p>
    <p> </p>
    <p><strong>15. Campaigns</strong></p>
    <p>15.1.1 Promotion codes are valid on the total cost of the order before shipping costs and/or applicable taxes are applied.</p>
    <p>15.1.2 ELEGANCE reserves the right to cancel, edit, shorten or extend promotions at any time.</p>
    <p>15.1.3 Only one promotion per order may be applied unless noted specifically in the promotion details.</p>
    <p> </p>

    </div>
    </div>
</div>

@endsection
