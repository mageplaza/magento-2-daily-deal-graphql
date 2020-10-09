# Magento 2 Daily Deal GraphQL (Support PWA)

Mageplaza Daily Deal Extension supports getting and pushing data on the website with GraphQl.

## How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-daily-deal-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## How to use

To start working with **Daily Deal GraphQL** in Magento, you need to:

- Use Magento 2.3.x. Return your site to developer mode
- Install [chrome extension](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) (currently does not support other browsers)
- Set **GraphQL endpoint** as `http://<magento2-3-server>/graphql` in url box, click **Set endpoint**. (e.g. http://develop.mageplaza.com/graphql/ce232/graphql)
- Perform a query in the left cell then click the **Run** button or **Ctrl + Enter** to see the result in the right cell
- To see the supported queries for **Daily Deal GraphQL** of Mageplaza, you can look in `Docs > Query > MpDailyDeals` in the right corner

![](https://i.imgur.com/rjNCvSi.png)

- Also, you can add discount label and countdown timer data into product query by Mageplaza Daily Deal extension. You can look at the right corner and go to `Doc > Query > product`.

![](https://i.imgur.com/M6vrkHl.png)

## Documentation

- Installation guide: https://www.mageplaza.com/install-magento-2-extension/#solution-1-ready-to-paste
- User guide: https://docs.mageplaza.com/daily-deal/
- Report a security issue to security@mageplaza.com
