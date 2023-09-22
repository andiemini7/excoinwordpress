
<?php 
    $module_array = [];
    foreach ($modules as $key => $module) {
        if ($module['acf_fc_layout'] == 'sellbuy_crypto') {
            // $module_array = $module['sellbuy_crypto'];
            unset($modules[$key]);
            break;
        }
    }

$ids = "tether,bitcoin,litecoin,ethereum,tron,ripple";
$url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=$ids";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'YourAppName/1.0 (http://yourappname.com)');
// Disable this line in production
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$json = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);

$coins = json_decode($json, true);
    // var_dump($coins);
?>

<section id="crypto" class="container">
    <div class="crypto">
        <div class="crypto_marketplace">
            <div class="crypto_marketplace_tabs">
                <span class="crypto_marketplace_tabs_buy active">Buy Crypto</span>
                <span class="crypto_marketplace_tabs_sell">Sell Crypto</span>
            </div>
            <div class="crypto_marketplace_buy active">
                <div class="crypto_marketplace_buy_dropdowns">
                    <div class="crypto_marketplace_buy_dropdowns_coin">
                        <label for="coins">Coin</label>
                        <div class="coin-amount">
                            <select id="coins">
                                <option disabled selected value>Coin</option>
                                <?php foreach ($coins as $coin): ?>
                                    <option value="<?php echo htmlspecialchars($coin['symbol']); ?>" data-price="<?php echo $coin['current_price']; ?>">
                                        <?php echo htmlspecialchars($coin['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input id="coin-amount">
                        </div>
                    </div>
                    <div class="crypto_marketplace_buy_dropdowns_amount">
                        <label for="amount">Amount</label>
                        <div class="amount_inputs">
                            <input id="amount">
                            <select id="currency_type">
                                <option value="usd">USD</option>
                                <option value="eur">Euro</option>
                            </select>
                        </div>
                        <div class="fee">
                            <span class="fee_title">Transfer fee</span>
                            <span id="transfer_fee_percentage" class="fee_price" value="<?= $module['transfer_fee']; ?>"><?= $module['transfer_fee']; ?>%</span>
                        </div>
                    </div>
                </div>
                <div class="crypto_marketplace_buy_price">
                    <div class="crypto_marketplace_buy_price_total">
                        <span class="crypto_marketplace_buy_price_total_title">Total:</span>
                        <span class="crypto_marketplace_buy_price_total_amount"></span>
                    </div>
                    <a href="#" class="site_button" id="send_request" data-baseurl="<?= $module['redirect_url_site']; ?>">Send Request</a>
                </div>
            </div>

            
        </div>
        <div class="crypto_items">
        <?php $coins =  array_slice($coins, 0, 3);
         foreach ($coins as $coin): ?>
            <div class="crypto_prices">
                <div class="crypto_prices_info">
                    <img src="<?php echo htmlspecialchars($coin['image']); ?>">
                    <div class="crypto_prices_info_title">
                        <span class="shortcode"><?php echo htmlspecialchars($coin['symbol']); ?></span>
                        <span class="name"><?php echo htmlspecialchars($coin['name']); ?></span>
                    </div>
                </div>
                <div class="crypto_prices_value">
                    <span class="crypto_prices_value_title">Price:</span>
                    <span class="crypto_prices_value_amount">$<?php echo htmlspecialchars($coin['current_price']); ?></span>
                </div>
                <div class="crypto_prices_change">
                    <span class="crypto_prices_change_title">Change</span>
                    <img src="<?= get_template_directory_uri() ?>/images/arrow.png">
                    <span class="crypto_prices_change_value"><?php echo htmlspecialchars($coin['price_change_percentage_24h']); ?>%</span>
                </div>
            </div>
        <?php endforeach; ?>
         </div>
    </div>
</section>