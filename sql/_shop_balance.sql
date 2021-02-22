-- 샵 정산
select
    a.shop_id as '샵아이디',
    b.shop_name as '브랜드명',
    a.purchase_code as '구매코드',
    a.user_id as '유저아이디',
    d.email as '유저이메일',
    a.product_id as '상품아이디',
    c.item_name as '상품명',
    a.free_shipping as '무료배송여부',
    a.free_shipping_total_price as '무료배송가격',
    a.free_shipping_cond_price as '배송비',
    a.bundle_shipping_cnt as '묶음배송갯수',
    a.item_general_price as '정상가',
    a.item_discount_rate '할인율',
    a.item_sell_price as '판매가',
    a.item_margin as '마진율',
    a.item_supply_price as '공급가',
    a.total_purchase_cnt as '구매갯수',
    a.total_price as '전체상품가격',
    a.total_shipping_fee as '전체배송비',
    a.total_additional_price as '전체추가금액',
    a.discount as '할인금액',
    a.user_coupon_id as '쿠폰사용시아이디',
    a.total_balance as '총금액',
    a.total_balance - a.discount as '결제금액',
    -- TRUNCATE(a.total_price * (100 - a.item_margin) / 100,-2) + a.total_shipping_fee + a.total_additional_price as '정산금액',
    a.shop_balance as '정산급액',
    a.shipping_status_code as '구매상태',
    a.purchase_at as '구매날짜',
    a.modified_at as '상태변경날짜(구매확정)'
from shop_purchase_product a, shop b, shop_product c, user d
where a.shop_id=12 and a.shipping_status=6 and a.shop_balance>0 and a.shop_id=b.shop_id
  and a.product_id=c.product_id and a.user_id=d.user_id;

update shop_purchase_product
set shop_balance=(TRUNCATE(total_price * (100 - item_margin) / 100,-2) + total_shipping_fee + total_additional_price)
where shop_id=12 and shipping_status=6 and shop_balance=0;