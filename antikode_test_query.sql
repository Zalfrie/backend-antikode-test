/* Select name from brand table */
SELECT brands.name FROM brands;

/* Select name, address, longitude, latitude from outlet table */
SELECT outlets.name, outlets.address, outlets.longitude, outlets.latitude FROM outlets;

/* Select Total product from product table */
SELECT count(products.id) AS total_product FROM products;

/*  distance to Monas */
SELECT outlets.name, ROUND(
        ST_Distance_Sphere(
            point(106.827153, -6.175392),
            point(outlets.longitude, outlets.latitude)
            ) / 1000, 2) AS jarak_dari_monas
FROM outlets;

/*  distance closest to Monas with sort asc*/
SELECT
    brands.name as brand_name,
    outlets.name as outlet_name,
    outlets.address as address,
    outlets.longitude,
    outlets.latitude,
    ROUND(
            ST_Distance_Sphere(
                point(106.827153, -6.175392),
                point(outlets.longitude, outlets.latitude)
                ) / 1000, 2
        ) AS jarak_dari_monas,
    (SELECT count(products.id) FROM products WHERE brand_id = brands.id) AS total_product_by_brand
FROM brands
         JOIN outlets on outlets.brand_id = brands.id
ORDER BY jarak_dari_monas ASC;
