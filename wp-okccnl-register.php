<?php
/*
Plugin Name: OKCCNL C Register
Plugin URI:  https://github.com/Opvolger/okccnl.wp
Description: Opel Kadett C Register
Version:     0.5
Author:      Bas Magré
Author URI:  http://www.opelkadettcclub.nl
License:     None
License URI: https://
*/

function html_form_code($kleuren, $motor_gegevens)
{
?>
    <style>
        /* .kadett-c-register-form::after {
            content: "";
            clear: both;
            display: table;
        } */

        .form-group {
            line-height: 1.42857143;
            color: #333;
            font-size: 12px;
            box-sizing: border-box;
            min-height: 100px;
            max-height: 200px;
            background-color: #f9f9f9;
            margin: 2px;
            padding: 10px;
        }


        .form-group-label {
            float: left;
            width: 30%;
        }

        .form-group-div {
            float: left;
            width: 60%;
        }

        .kadett-c-div {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            line-height: 1.42857143;
            color: #333;
            font-size: 12px;
            cursor: pointer;
            box-sizing: border-box;
            max-height: 300px;
            min-height: 140px;
            background-color: #f9f9f9;
            margin: 2px;
            padding: 10px;
        }

        .kadett-c-image img {
            max-height: none;
            max-width: none;
            width: 100px;
        }

        .kadett-c-image {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            line-height: 1.42857143;
            color: #333;
            font-size: 12px;
            cursor: pointer;
            box-sizing: border-box;
            padding-right: 10px;
            display: table-cell;
            vertical-align: top;
        }

        .kadett-c-info {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            line-height: 1.42857143;
            color: #333;
            font-size: 12px;
            cursor: pointer;
            box-sizing: border-box;
            overflow: hidden;
            zoom: 1;
            width: 10000px;
            display: table-cell;
            vertical-align: top;
        }
    </style>
    <?php
    echo '<form class="kadett-c-register-form" action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    ?>
    <div>
        <div>
            <div class="form-group">
                <label class="form-group-label" for="cf-kenteken">Gedeelte kenteken:</label>
                <div class="form-group-div">
                    <input name="cf-kenteken" placeholder="Gedeelte kenteken" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="cf-actief">Alleen Actieve kentekens?:</label>
                <div class="form-group-div">
                    <input type="checkbox" name="cf-actief" value="true" <?php
                                                                            if (isset($_POST["cf-actief"]) && ($_POST["cf-actief"] == "true")) {
                                                                                print(' checked');
                                                                            }
                                                                            ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="cf-automaat">Alleen Automaat?:</label>
                <div class="form-group-div">
                    <input type="checkbox" name="cf-automaat" value="true" <?php
                                                                            if (isset($_POST["cf-automaat"]) && ($_POST["cf-automaat"] == "true")) {
                                                                                print(' checked');
                                                                            }
                                                                            ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="cf-vierdeurs">Alleen Vierdeurs?:</label>
                <div class="form-group-div">
                    <input type="checkbox" name="cf-vierdeurs" value="true" <?php
                                                                            if (isset($_POST["cf-vierdeurs"]) && ($_POST["cf-vierdeurs"] == "true")) {
                                                                                print(' checked');
                                                                            }
                                                                            ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="cf-foto">Alleen met foto?:</label>
                <div class="form-group-div">
                    <input type="checkbox" name="cf-foto" value="true" <?php
                                                                        if (isset($_POST["cf-foto"]) && ($_POST["cf-foto"] == "true")) {
                                                                            print(' checked');
                                                                        }
                                                                        ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="cf-kleur">Kleur:</label>
                <div class="form-group-div">


                    <?php
                    echo '<select name="cf-kleur" value="' . (isset($_POST["cf-kleur"]) ? esc_attr($_POST["cf-kleur"]) : '') . '">';
                    echo '<option value="-alle-">-alle-</option>';
                    foreach ($kleuren as $kleur) {
                        if (!isset($_POST["cf-reset"]) && isset($_POST["cf-kleur"]) && esc_attr($_POST["cf-kleur"]) == $kleur) {
                            echo '<option value="' . $kleur . '" selected="selected">' . $kleur . '</option>';
                        } else {
                            echo '<option value="' . $kleur . '">' . $kleur . '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="type">Type:</label>
                <div class="form-group-div">
                    <select name="type">
                        <!-- ngRepeat: option in typekeuzes -->
                        <option ng-repeat="option in typekeuzes" value="-alle-" class="ng-binding ng-scope">-alle-</option><!-- end ngRepeat: option in typekeuzes -->
                        <option ng-repeat="option in typekeuzes" value="C1" class="ng-binding ng-scope">C1</option><!-- end ngRepeat: option in typekeuzes -->
                        <option ng-repeat="option in typekeuzes" value="C2" class="ng-binding ng-scope">C2</option><!-- end ngRepeat: option in typekeuzes -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="model">Model:</label>
                <div class="form-group-div">
                    <select name="model">
                        <!-- ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="-alle-" class="ng-binding ng-scope">-alle-</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Aero" class="ng-binding ng-scope">Aero</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Cabriolet" class="ng-binding ng-scope">Cabriolet</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Caravan" class="ng-binding ng-scope">Caravan</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="City" class="ng-binding ng-scope">City</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Coupe" class="ng-binding ng-scope">Coupe</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Onbekend" class="ng-binding ng-scope">Onbekend</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Pickup" class="ng-binding ng-scope">Pickup</option><!-- end ngRepeat: option in modelkeuzes -->
                        <option ng-repeat="option in modelkeuzes" value="Sedan" class="ng-binding ng-scope">Sedan</option><!-- end ngRepeat: option in modelkeuzes -->
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-group-label" for="cf-motor-gegevens">Motor:</label>
                <div class="form-group-div">
                    <?php
                    echo '<select name="cf-motor-gegevens" value="' . (isset($_POST["cf-motor-gegevens"]) ? esc_attr($_POST["cf-motor-gegevens"]) : '') . '">';
                    echo '<option value="-alle-">-alle-</option>';
                    foreach ($motor_gegevens as $motor_gegeven) {
                        if (!isset($_POST["cf-reset"]) && isset($_POST["cf-motor-gegevens"]) && esc_attr($_POST["cf-motor-gegevens"]) == $motor_gegeven['Afkorting']) {
                            echo '<option value="' . $motor_gegeven['Afkorting'] . '" selected="selected">' . $motor_gegeven['Afkorting'] . '</option>';
                        } else {
                            echo '<option value="' . $motor_gegeven['Afkorting'] . '">' . $motor_gegeven['Afkorting'] . '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-group-label" for="soortgegevens">Welke gegevens?:</label>
                <div class="form-group-div">
                    <div class="radio">
                        <label><input type="radio" value="Papier" name="soortgegevens">Papier</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="Fabriek" name="soortgegevens">Fabriek</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="LaatstBekend" name="soortgegevens">LaatstBekend</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-group-label" for="zoeken"></label>
                <div class="form-group-div">
                    <p><input type="submit" name="cf-reset" value="Reset" /> <input type="submit" name="cf-submitted" value="Zoeken" /></p>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php
}

function get_api_value($cf_value)
{
    $value = null;
    if (isset($_POST[$cf_value])) {
        $value = sanitize_text_field($_POST[$cf_value]);
    }
    if ($value == '-alle-') {
        $value = null;
    }
    return $value;
}

function get_api_value_bool($cf_value, $default)
{
    $value = $default;
    if (isset($_POST[$cf_value]) && $_POST[$cf_value] == 'true') {
        $value = true;
    }
    return $value;
}

function show_result($url, $alle_motor_gegevens)
{

    // if the submit button is clicked, send the email
    if (isset($_POST['cf-submitted'])) {

        // sanitize form values
        $motor_gegevens = get_api_value("cf-motor-gegevens");
        $motor_gegevens_gevonden = false;
        foreach ($alle_motor_gegevens as $check_motor_gegevens) {
            if ($check_motor_gegevens['Afkorting'] == $motor_gegevens) {
                $motor_gegevens = $check_motor_gegevens;
                $motor_gegevens_gevonden = true;
            }
        }
        if (!$motor_gegevens_gevonden) {
            $motor_gegevens = null;
        }
        $kleur = get_api_value("cf-kleur");
        $kenteken = get_api_value("cf-kenteken");
        $actief = get_api_value_bool("cf-actief", null);
        $foto = get_api_value_bool("cf-foto", false);
        $transmissie = null;
        if (get_api_value_bool("cf-automaat", false)) {
            $transmissie = 'automaat';
        }

        $vierdeurs = get_api_value_bool("cf-vierdeurs", null);

        // The data to send to the API
        $postData = array(
            "kadettLijst" => false,
            "zoekOpdracht" => array(
                "gedeelteKenteken" => $kenteken,
                "soortGegevens" => "LaatstBekend",
                "kleur" => $kleur,
                "type" => null,
                "model" => null,
                "motorGegevens" => $motor_gegevens,
                "transmissie" => $transmissie,
                "actief" => $actief,
                "foto" => $foto,
                "vierDeurs" => $vierdeurs
            )
        );
        // print("data in:");
        // print_r($postData);

        // Print the date from the response
        $response = do_call('https://api.opelkadettcclub.nl/api/', 'KadettC/GetKadettCZoek', $postData);
        // print("data out:");
        // print_r($response);

        $kadett_c_counter = count($response['KadettCIds']);

        print('<div class="kadett-c-gevonden-aantal">Totaal gevonden: ' . $kadett_c_counter . "</div>");


        //https://codepen.io/tutsplus/pen/gOeYKwE
    ?>
        <div id="kadett-container">
        </div>
        <div id="kadett-more">
            More.....
        </div>

        <script>
            const kadettContainer = document.getElementById("kadett-container");
            const kadettMore = document.getElementById("kadett-more");

            const kadettLimit = <?php print($kadett_c_counter) ?>;
            const kadettIncrease = 20;
            const pageCount = Math.ceil(kadettLimit / kadettIncrease);
            const url = '<?php print($url) ?>';
            let currentPage = 1;


            const kadettIds = [
                <?php

                $firstInArray = true;

                foreach ($response['KadettCIds'] as $kadett_id) {
                    if ($firstInArray) {
                        print("'" . $kadett_id . "'");
                    } else {
                        print(",'" . $kadett_id . "'");
                    }
                    $firstInArray = false;
                }
                ?>
            ];

            const setKadettCInfo = (id) => {
                completeUrl = url + "KadettC/GetKadettC";
                const kadett = document.createElement("div");
                kadett.className = "kadett-c-div";
                kadett.innerHTML = "Loading...."
                fetch(completeUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: '{ "kadettId": ' + id + '}',
                }).then(x => x.json().then(data => {
                    kadett.innerHTML = "";
                    const kadett_image = document.createElement("div");
                    kadett_image.className = "kadett-c-image";
                    kadett.appendChild(kadett_image);
                    var img = document.createElement("img");
                    img.setAttribute("src", "https://logos-world.net/wp-content/uploads/2021/04/Opel-Logo-700x394.png");
                    kadett_image.appendChild(img);
                    imageUrl = url + "KadettC/GetKadettCImage";
                    fetch(imageUrl, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: '{ "kadettId": ' + id + ',"size": 100,"byteArray": false}',
                    }).then(x => x.json().then(data_img => {
                        console.log(data_img)
                        img.setAttribute("alt", "Kadett image");
                        if (data_img['Data']['Aanwezig']) {
                            img.setAttribute("src", "data:image/png;base64," + data_img['Data']['ImageBase64String']);
                        }
                    }));
                    const kadett_info = document.createElement("div");
                    kadett_info.className = "kadett-c-info";
                    kadett.appendChild(kadett_info);
                    //kadett.innerHTML = id;
                    kadett_info.innerHTML = '<!--' + id + '-->' + data['Data']['KadettC']['HuidigKenteken']['Tekst'];
                    kadett.style.backgroundColor = getRandomColor();
                    kadettContainer.appendChild(kadett);
                }));
            }

            const getRandomColor = () => {
                const h = Math.floor(Math.random() * 360);

                return `hsl(${h}deg, 90%, 85%)`;
            };

            const addKadetts = (pageIndex) => {
                currentPage = pageIndex;

                const startRange = (pageIndex - 1) * kadettIncrease;
                const endRange =
                    currentPage == pageCount ? kadettLimit : pageIndex * kadettIncrease;

                for (let i = startRange + 1; i <= endRange; i++) {
                    kadettCId = kadettIds[i - 1]
                    setKadettCInfo(kadettCId)
                }
            };

            const handleInfiniteScroll = () => {
                throttle(() => {
                    const endOfPage =
                        window.innerHeight + window.pageYOffset >= document.body.offsetHeight;

                    if (endOfPage) {
                        addKadetts(currentPage + 1);
                    }

                    if (currentPage === pageCount) {
                        removeInfiniteScroll();
                    }
                }, 1000);
            };

            const removeInfiniteScroll = () => {
                kadettMore.remove()
                window.removeEventListener("scroll", handleInfiniteScroll);
            };

            window.onload = function() {
                addKadetts(currentPage);
            };

            var throttleWait;

            const throttle = (callback, time) => {
                if (throttleWait) return;
                throttleWait = true;

                setTimeout(() => {
                    callback();
                    throttleWait = false;
                }, time);
            };

            window.addEventListener("scroll", handleInfiniteScroll);
        </script>
<?php
    }
}

function do_call($url, $call, $postData)
{

    // Create the context for the request
    $context = stream_context_create(array(
        'http' => array(
            // http://www.php.net/manual/en/context.http.php
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n", // . 
            //"Authorization: ".$token."\r\n",
            'content' => json_encode($postData)
        )
    ));

    // Send the request
    $response = file_get_contents($url . $call, FALSE, $context);

    // Decode the response
    $responseData = json_decode($response, TRUE);

    if ($responseData['Succes']) {
        return $responseData['Data'];
    }
    echo $response;
    return null;
}

function cf_shortcode()
{
    $url = 'https://api.opelkadettcclub.nl/api/';
    # niet committen! eerst authenticatie er afhalen.
    ob_start();

    $kleuren = do_call($url, 'KadettC/GetKadettKleur', '{}')['Waardes'];
    $motor_gegevens = do_call($url, 'KadettC/GetKadettMotor', '{}')['WaardesMotorGegevens'];

    html_form_code($kleuren, $motor_gegevens);
    show_result($url, $motor_gegevens);
    return ob_get_clean();
}

function okccnl_plugin_setup_menu(){
    add_menu_page( 'OKCCNL Plugin Page', 'OKCCNL Plugin', 'manage_options', 'okccnl-plugin', 'okccnl_admin_init' );
}

function okccnl_admin_init(){
    echo "<h1>Hello World!</h1>";
}

add_shortcode('kadett_c_register', 'cf_shortcode');
add_action('admin_menu', 'okccnl_plugin_setup_menu');

// http://localhost:8282/wp-admin