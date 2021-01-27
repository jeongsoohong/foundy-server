update shop_purchase_product
set canceled=1,cancel_price='',cancel_data='샵 어드민 오류로 페이앱에서 결제취소',
cancel_reason='품절에 의한 샵 요청',shipping_status=2,shipping_status_code='주문취소',canceled_at=NOW()
where purchase_product_id=;

insert shop_purchase_product_status
(purchase_product_id,shipping_status,shipping_status_code,shipping_data,modified_at)
values (,2,'주문취소','',NOW());

update shop_product_id set sell=sell-1 where product_id=;