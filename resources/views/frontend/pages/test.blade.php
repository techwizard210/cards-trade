<!DOCTYPE html>
<html>
  <head>
    <title>ELEGANCE VIRTUAL TRY-ON DEMO</title>
    <meta charset='utf-8' />

    <!-- Forbid resize on pinch with IOS Safari: -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>

    <!-- INCLUDE MAIN SCRIPT: -->
    <script src='{{ asset('assets/plugin/JeelizVTOWidget/JeelizVTOWidget.js') }}'></script>

    <!-- For icons adjust fame or resize canvas -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- Font for the header only: -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- main stylesheet: -->
    <link rel='stylesheet' href='{{ asset('assets/plugin/JeelizVTOWidget/JeelizVTOWidget.css') }}' />

    <script>
      let _isResized = false;

      function test_resizeCanvas() {
        // halves the height:
        let halfHeightPx = Math.round(window.innerHeight / 2).toString() + 'px';

        const domWidget = document.getElementById('JeelizVTOWidget');
        domWidget.style.maxHeight = (_isResized) ? 'none' : halfHeightPx;

        _isResized = !_isResized;
      }


      function get_initialSKU(){
        // look if a SKU is provided as a URL parameters:
        const queryString = window.location.search;
        const URLParams = new URLSearchParams(queryString);
        const sku = URLParams.get('sku') || 'rayban_aviator_or_vertFlash';
        console.log('Initial SKU =', sku);
        return sku;
      }


      function get_isShadow(){
        const queryString = window.location.search;
        const URLParams = new URLSearchParams(queryString);
        return URLParams.get('isHideShadow') ? false : true;
      }


      // entry point:
      function main() {
        JEELIZVTOWIDGET.start({
          isShadow: get_isShadow(),
          sku: get_initialSKU(),
          searchImageMask: '{{ asset('assets/images/VOT_mask.jpg') }}',
          searchImageColor: 0x1dabff,
          callbackReady: function(){
            console.log('INFO: DEMO is ready :)');

            // add a LUT to change video rendering:
            //JEELIZVTOWIDGET.set_LUT('images/LUTs/LUTGrayscale.png');
            //JEELIZVTOWIDGET.set_LUT('images/LUTs/LUTImprove.jpg');
          },
          onError: function(errorLabel){ // this function catches errors, so you can display custom integrated messages
            alert('An error happened. errorLabel =' + errorLabel)
            switch(errorLabel) {
              case 'WEBCAM_UNAVAILABLE':
                // the user has no camera, or does not want to share it.
                break;

              case 'NOFILE':
                // the user send an image, but it is not here
                break;

              case 'WRONGFILEFORMAT':
                // the user upload a file which is not an image or corrupted
                break;

              case 'INVALID_SKU':
                // the provided SKU does not match with a glasses model
                break;

              case 'FALLBACK_UNAVAILABLE':
                // we cannot switch to file upload mode. browser too old?
                break;

              case 'PLACEHOLDER_NULL_WIDTH':
              case 'PLACEHOLDER_NULL_HEIGHT':
                // Something is wrong with the placeholder
                // (element whose id='JeelizVTOWidget')
                break;

              case 'FATAL':
              default:
                // a bit error happens:(
                break;
            } // end switch
          } // end onError()
        }) // end JEELIZVTOWIDGET.start call
      } // end main()


      function load_modelBySKU(){
        const sku = prompt('Please enter a glasses model SKU:', 'rayban_wayfarer_havane_marron');
        if (sku){
          JEELIZVTOWIDGET.load(sku);
        }
      }

    </script>
  </head>

  <body onload="main()">
    <div class='content'>


      <div class='header' style="background-color: rgb(165 119 37);">
        <div class="headerTitle">
          ELEGANCE Virtual Try-On Demo
        </div>
      </div>


      <!-- Please keep the same element IDs so that JEELIZVTOWIDGET can extract them from the DOM -->

      <!-- BEGIN JEELIZVTOWIDGET -->
      <!--
        div with id='JeelizVTOWidget' is the placeholder
        you need to size and position it according to where the VTO widget should be
        if you resize it, the widget will be automatically resized
      -->
      <div id='JeelizVTOWidget'>
        <!-- MAIN CANVAS: -->
        <!--
         canvas with id='JeelizVTOWidgetCanvas' is the canvas where the VTO widget will be rendered
         it should have CSS attribute position: absolute so that it can be resized without
         changing the total size of the placeholder
        -->
        <canvas id='JeelizVTOWidgetCanvas'></canvas>

        <div class='JeelizVTOWidgetControls JeelizVTOWidgetControlsTop'>
          <!-- ADJUST BUTTON: -->
          <button id='JeelizVTOWidgetAdjust'>
            <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust
          </button>

          <!-- RESIZE WIDGET BUTTON: -->
          <button id='buttonResizeCanvas' onclick='test_resizeCanvas();'>
            <div class="buttonIcon"><i class="fas fa-sync-alt"></i></div>Resize widget
          </button>
        </div>

        <!-- CHANGE MODEL BUTTONS: -->
        <div class='JeelizVTOWidgetControls' id='JeelizVTOWidgetChangeModelContainer'>
          <button onclick="JEELIZVTOWIDGET.load('rayban_aviator_or_vertFlash')">Model 1</button>
          <button onclick="JEELIZVTOWIDGET.load('rayban_round_cuivre_pinkBrownDegrade')">Model 2</button>
          <button onclick="JEELIZVTOWIDGET.load_modelStandalone('glasses3D/glasses1.json')">Model 3</button>
          <button onclick="load_modelBySKU()">by SKU</button>
        </div>

        <!-- BEGIN ADJUST NOTICE -->
        <div id='JeelizVTOWidgetAdjustNotice'>
          Move the glasses to adjust them.
          <button class='JeelizVTOWidgetBottomButton' id='JeelizVTOWidgetAdjustExit'>Quit</button>
        </div>
        <!-- END AJUST NOTICE -->

        <!-- BEGIN LOADING WIDGET (not model) -->
        <div id='JeelizVTOWidgetLoading'>
           <div class='JeelizVTOWidgetLoadingText'>
              LOADING...
            </div>
        </div>
        <!-- END LOADING -->

      </div>
    </div>
  </body>
</html>
