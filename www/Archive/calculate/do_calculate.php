<!DOCTYPE HTML PUBLIC "-//W3C//DCT HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Bean Counter Results</TITLE>
  </HEAD>
  <BODY>
    <?php

// set up the pricing assignments
if ($_POST[beans] == "Ethiopian Harrar") {
  $price = 14.25;
} else if ($_POST[beans] == "Kona") {
  $price = 16.25;
} else if ($_POST[beans] == "Sumatra") {
  $price = 13.00;
}

$sales_tax = .0825;
$sub_total = $price * $_POST[quantity];
$sales_tax_amount = $sub_total * $sales_tax;
$sales_tax_pct = $sales_tax * 100;
$grand_total = $sub_total + $sales_tax_amount;

$fmt_price = sprintf("%0.2f",$price);
$fmt_sub_total = sprintf("%0.2f",$sub_total);
$fmt_sales_tax_amount = sprintf("%0.2f",$sales_tax_amount);
$fmt_grand_total = sprintf("%0.2f",$grand_total);

echo "<P>You ordered $_POST[quantity] bags of $_POST[beans].</p>"; 
echo "<P>Bags of $_POST[beans] are \$$fmt_price each.</p>";
echo "<P>Your subtotal is \$$fmt_sub_total.</p>";
echo "<P>Sales tax is $sales_tax_pct% in this location.</p>";
echo "<P>\$$fmt_sales_tax_amount has been added to your order.</p>";
echo "<P>You owe \$$fmt_grand_total for your coffee.</p>";

?>
</BODY>
</HTML>