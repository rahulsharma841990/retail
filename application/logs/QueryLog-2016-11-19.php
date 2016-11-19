SELECT *
FROM `godown_login`
WHERE `store_username` = 'storeone'
AND `store_password` = 'e10adc3949ba59abbe56e057f20f883e' 
 Execution Time:0.052777051925659

SHOW TABLES FROM `retail_local` 
 Execution Time:0.00084590911865234

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.052384853363037

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.0073277950286865

SELECT `retail_purchase`.*
FROM `retail_purchase`
 LIMIT 10 
 Execution Time:0.008126974105835

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.0080928802490234

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.0078349113464355

SELECT *
FROM `retail_purchase` 
 Execution Time:0.0096361637115479

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.011376142501831

SHOW COLUMNS FROM `retail_purchase` 
 Execution Time:0.0096700191497803

SELECT *
FROM `stores_list` 
 Execution Time:0.034244060516357

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` LIKE '%89%' ESCAPE '!' 
 Execution Time:0.0036079883575439

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0013539791107178

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` LIKE '%8901030591259%' ESCAPE '!' 
 Execution Time:0.0011329650878906

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.001129150390625

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` LIKE '%cha%' ESCAPE '!' 
 Execution Time:0.0012271404266357

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` = 'Channa Daal' 
 Execution Time:0.0011789798736572

SELECT *
FROM `retail_purchase`
WHERE `item_bar_code` LIKE '%Channa!%20Daal%' ESCAPE '!' 
 Execution Time:0.0010759830474854

SELECT *
FROM `invoice_num` 
 Execution Time:0.068078994750977

UPDATE `invoice_num` SET invoice_num = invoice_num+1, `last_invoice_to` = '35', `last_updated` = '2016-11-19 06:25:13' 
 Execution Time:0.056858062744141

SELECT *
FROM `stores_list`
WHERE `id` = '35' 
 Execution Time:0.00077700614929199

SELECT *
FROM `store_35_stock`
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.051759004592896

UPDATE `store_35_stock` SET item_qty = item_qty+0, `store_id` = '35', `item_bar_code` = '8901030591259', `item_category` = NULL, `item_name` = 'TAJ  Mahal 500GM', `item_desc` = 'TAJ  Mahal 500GM', `item_sale_price` = '210', `item_mrp` = '215', `item_unit` = 'PC', `free_item_barcode` = '0', `free_item_name` = '', `free_item_qty` = '0', `expiry_date` = '0000-00-00', `item_sku` = 'TAJ145', `last_updated` = '2016-11-19'
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0085060596466064

UPDATE `retail_purchase` SET item_qty = item_qty-0
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0030801296234131

SELECT *
FROM `store_35_stock`
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0017499923706055

UPDATE `store_35_stock` SET item_qty = item_qty+0, `store_id` = '35', `item_bar_code` = '8901030591259', `item_category` = NULL, `item_name` = 'TAJ  Mahal 500GM', `item_desc` = 'TAJ  Mahal 500GM', `item_sale_price` = '210', `item_mrp` = '215', `item_unit` = 'PC', `free_item_barcode` = '0', `free_item_name` = '', `free_item_qty` = '0', `expiry_date` = '0000-00-00', `item_sku` = 'TAJ145', `last_updated` = '2016-11-19'
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0090570449829102

UPDATE `retail_purchase` SET item_qty = item_qty-0
WHERE `item_bar_code` = '8901030591259' 
 Execution Time:0.0029480457305908

SELECT *
FROM `store_35_stock`
WHERE `item_bar_code` = 'Channa Daal' 
 Execution Time:0.0025529861450195

UPDATE `store_35_stock` SET item_qty = item_qty+0, `store_id` = '35', `item_bar_code` = 'Channa Daal', `item_category` = NULL, `item_name` = 'Channa Daal', `item_desc` = 'Channa Daal', `item_sale_price` = '0', `item_mrp` = '125', `item_unit` = 'PC', `free_item_barcode` = '0', `free_item_name` = '', `free_item_qty` = '0', `expiry_date` = '0000-00-00', `item_sku` = 'Channa145', `last_updated` = '2016-11-19'
WHERE `item_bar_code` = 'Channa Daal' 
 Execution Time:0.0078990459442139

UPDATE `retail_purchase` SET item_qty = item_qty-0
WHERE `item_bar_code` = 'Channa Daal' 
 Execution Time:0.0032320022583008

