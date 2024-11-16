<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
  <title>Delivery</title>
</head>

<body>
  <style>
    body {
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      display: flex;
      flex-direction: column;
      width: 50%;
      position: absolute;
      min-height: 300px;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      border-radius: 8px;
      background-color: white;
    }

    .modal-body {
      margin-top: 20px;
      min-height: 250px;
    }

    .modal-footer {
      display: flex;
      margin-top: 20px;
    }
  </style>

<?php
class MyDB extends SQLite3 {
  function __construct() {
     $this->open('../../test.db');
  }
}

// 2. Open Database
$db = new MyDB();
if(!$db) {
  echo $db->lastErrorMsg();
}

?>



<?php
$orderId = isset($_GET['orderId']) ? $_GET['orderId'] : null;

$ordersDeliverySQL = "SELECT
    o.custId,
    o.deliveryId,
    p.amountMoney,
    p.paymentMethod,
    p.paymentStatus,
    d.deliveryName,
    d.deliveryPhone,
    d.latlong,
    d.deliveryStatus
    FROM orders o
    LEFT JOIN payment p ON o.orderId = p.orderId
    LEFT JOIN delivery d ON o.deliveryId = d.deliveryId
    WHERE o.deliveryId IS NOT NULL AND o.orderId = $orderId";

$ordersDeliveryResult = $db->query($ordersDeliverySQL);

if ($ordersDeliveryResult->numColumns() > 0) {
    $ordersDetailRow = $ordersDeliveryResult->fetchArray(SQLITE3_ASSOC);

    // Table orders
    $custId = $ordersDetailRow['custId'];
    $deliveryId = $ordersDetailRow['deliveryId'];

    // Table payment
    $amountMoney = $ordersDetailRow['amountMoney'];
    $paymentMethod = $ordersDetailRow['paymentMethod'];
    $paymentStatus = $ordersDetailRow['paymentStatus'];

    // Table delivery
    $deliveryName = $ordersDetailRow['deliveryName'];
    $deliveryPhone = $ordersDetailRow['deliveryPhone'];
    $latlong = $ordersDetailRow['latlong'];
    $deliveryStatus = $ordersDetailRow['deliveryStatus'];
}
?>

  <div class="bg-white pr-8 pl-8 pb-8">
    <div class="grid place-content-center gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
      <div class="col-span-3 sm:col-span-4">
        <div id="blaktomenu" class="hover:text-red-600 ">
          <a href="manageDelivery.php">
          <span class="flex">
          <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
          </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2  gap-2 mt-[3%] max-[650px]:grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-center">
      <div class="w-full mx-auto p-8 rounded-md shadow-xl m-2 ">
        <h2 class="text-red-700 text-2xl font-semibold mb-6">ข้อมูลติดต่อ</h2>

        <form action="process_form.php" method="post">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-black-500">ชื่อ :</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $deliveryName; ?>">
          </div>

          <div class="mb-4">
            <label for="npm-install-copy-button" class="block text-sm font-medium text-black-500">เบอร์ติดต่อ :</label>
            <div class="relative flex-grow">
              <input type="tel" id="npm-install-copy-button" name="phone" class="mt-1 p-2 w-full border rounded-md"  value="<?php echo $deliveryPhone; ?>">
              <button id="copy-button" class="absolute end-0 top-1/2 -translate-y-1/2 text-black-500 dark:text-red-400 hover:bg-gray-200 dark:hover:bg-red-800 rounded-lg p-2 inline-flex items-center justify-center">
                <span id="default-icon">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                  </svg>
                </span>
                <span id="success-icon" class="hidden inline-flex items-center">
                  <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                  </svg>
                </span>
              </button>
              <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <span id="default-tooltip-message">Copy to clipboard</span>
                <span id="success-tooltip-message" class="hidden">Copied!</span>
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
            </div>
          </div>



          <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-black-500">ที่อยู่ :</label>
            <input type="tel" id="address" name="address" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $latlong; ?>">
          </div>
        </form>

        <?php if ($custId !== null) { echo '<div class="flex-shrink-0 text-sm mt-6 text-red-700">*ลูกค้าเป็นสมาชิก</div>'; } ?>

      </div>


      <div>
      <section class="w-full mx-auto p-8 rounded-md shadow-xl m-2 h-[96%]">
    <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8 ml-[-4%]">
        <div class="flex items-center mt-[3%]">
            <h2 class="text-red-700 text-2xl font-semibold mb-6">รายการอาหารที่สั่ง</h2>
        </div>

        <div class="mt-[2%]">
            <?php
            $menuSQL = "SELECT od.menuQuantity, m.menuName, menuPrice FROM orderdetail od JOIN menu m ON od.menuId = m.menuId WHERE orderId = $orderId";
            $menuResult = $db->query($menuSQL);
            if ($menuResult->numColumns() > 0) {
                while ($menuRow = $menuResult->fetchArray(SQLITE3_ASSOC)) {
                    $menuQuantity = $menuRow['menuQuantity'];
                    $menuName = $menuRow['menuName'];
                    $menuPrice = $menuRow['menuPrice'];

                    echo '
                        <div class="flex items-center text-l text-red-700 mt-5">
                            <label for="count-menu" class="">' . $menuQuantity . '</label>
                            <div class="flex-shrink-0 text-sm pl-2">' . $menuName . '</div>
                            <div class="ml-auto text-right">฿' . number_format($menuPrice, 2) . '</div>
                        </div>
                    ';
                }
            }
            ?>
        </div>

        <div class="flex justify-between mt-6 pt-2 pb-2">
            <p>ทั้งหมด</p>
            <p><?php echo "฿" . number_format($amountMoney, 2) . ""; ?></p>
        </div>

        <div class="grid-cols-1 items-center ">
            <div class="mt-6">
                <label for="payment-method" class="block text-sm font-medium text-black-700">วิธีการชำระเงิน :</label>
                <input id="payment-method" name="payment-method" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 sm:text-sm"
                    value="<?php echo "$paymentMethod"; ?>"></input>
            </div>
        </div>
    </div>
</section>

      </div>
    </div>
  </div>

</body>

</html>
