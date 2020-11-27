# Magento 2 Daily Deal GraphQL (Support PWA)

[Mageplaza Daily Deal for Magento 2](https://www.mageplaza.com/magento-2-daily-deal-extension/) boosts online store sales effectively by offering customers daily deals. 

Online shoppers will usually go to the online store and search for discounts. The flash sales online store offers during daily shopping are great incentives for customers to purchase the products. That’s why online stores need to please customers with daily deals so that they don’t need to wait until big shopping days to save money. 

With Magento 2 Daily Deal, you can display your daily discounts with a countdown timer, which lets customers know about the deadline of the deals and increases the fear of missing out on them. This motivates customers to buy the products with a good bargain. You can easily customize this countdown timer like changing its color of backgrounds and text. 

From the admin backend, you can set up a daily deal for a specific product, limit the quantity and set up the start, and end time to apply the deals. You can also configure the deals page into an appealing page for customers to go shopping with different product blocks, such as the New deals page, Featured deals page, Bestseller deals page, and Upcoming deals page. Customers will see all updates about your deals via these pages, and they draw more customers’ attention. 

Mageplaza Daily Deal for Magento 2 supports displaying daily deals on the sidebar with sidebar widgets. You can display random deals, top-selling deals, and upcoming deals in the sidebar of any page to draw visitors to the deals and convert them to repeat customers. The number of products can also be displayed to notify customers about the number of remaining products or products sold that can create urgency when the products are nearly out of stock. The number of products sold also indicates how a specific product is worth to buy or not, so it’s important to showcase this number to customers. 

After configuring the daily deals to be automatically generated due to the schedule, the store admin can select the category to apply the deals, determine the special price, and the number of products generated. 

Moreover, **Magento 2 Daily Deal GraphQL is a part of Mageplaza Daily Deals extension that adds GraphQL features; this supports PWA Studio.** In other words, Mageplaza Daily Deal extension supports getting and pushing data on the website with GraphQL.

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-daily-deal-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```
**Note:** 
Magento 2 Daily Deal GraphQL requires installing [Mageplaza Daily Deal](https://www.mageplaza.com/magento-2-daily-deal-extension/) in your Magento installation. 

## 2. How to use

To start working with **Daily Deal GraphQL** in Magento, you need to:

- Use Magento 2.3.x. Return your site to developer mode
- Install [chrome extension](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) (currently does not support other browsers)
- Set **GraphQL endpoint** as `http://<magento2-3-server>/graphql` in url box, click **Set endpoint**. (e.g. http://develop.mageplaza.com/graphql/ce232/graphql)
- Perform a query in the left cell then click the **Run** button or **Ctrl + Enter** to see the result in the right cell
- To see the supported queries for **Daily Deal GraphQL** of Mageplaza, you can look in `Docs > Query > MpDailyDeals` in the right corner

![](https://i.imgur.com/rjNCvSi.png)

- Also, you can add discount label and countdown timer data into product query by Mageplaza Daily Deal extension. You can look at the right corner and go to `Doc > Query > product`.

![](https://i.imgur.com/M6vrkHl.png)

## 3. Documentation

- Installation guide: https://www.mageplaza.com/install-magento-2-extension/#solution-1-ready-to-paste
- User guide: https://docs.mageplaza.com/daily-deal/
- Report a security issue to security@mageplaza.com

## 4. Devdocs

- [Magento 2 Daily Deal API & examples](https://documenter.getpostman.com/view/10589000/SzRxXr7J?version=latest)
- [Magento 2 Daily Deal GraphQL & examples](https://documenter.getpostman.com/view/10589000/SzRxXrBj?version=latest)

Click on Run in Postman to add these collections to your workspace quickly. 

![Magento 2 blog graphql pwa](https://i.imgur.com/lhsXlUR.gif)

## 5. Contribute to this module

- Feel free to **Fork** and contribute to this extension 
- You can create a pull request, so we will merge your changes in the main branch. 

## 6. Get Support 

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any question. We're excited to hear from you, and will try our best to resolve your problems.  
- If you find this post helpful, please give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)





