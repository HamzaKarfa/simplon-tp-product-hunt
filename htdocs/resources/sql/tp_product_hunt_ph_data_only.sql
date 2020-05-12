-- Host: mysql
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tp_product_hunt`
--

-- --------------------------------------------------------

--
-- Placeholder data for table `products`
--

INSERT INTO `products`(
    `product_id`,
    `created_at`,
    `name`,
    `summary`,
    `website`,
    `thumbnail`,
    `votes_count`
)
VALUES(
    '1',
    '2020-05-10 07:01:00',
    'Rewind',
    'Your bookmarks, by date, with thumbnails and instant search',
    'https://rewind.netlify.app/?ref=producthunt',
    'public/images/products/thumbnails/1_Rewind.webp',
    0
),(
    '2',
    '2020-05-10 07:00:00',
    'Buy For Life',
    'Discover durable and sustainable products for a better world',
    'https://www.buyforlifeproducts.com/?ref=producthunt',
    'public/images/products/thumbnails/2_Buy-For-Life.webp',
    0
),(
    '3',
    '2020-05-10 07:01:00',
    'Remoty',
    'Time tracking, async daily standups & payroll exports',
    'https://remoty.dev?ref=producthunt',
    'public/images/products/thumbnails/3_Remoty.webp',
    0
),(
    '4',
    '2020-05-10 07:12:00',
    'Wedding Planning Assistant',
    'Everything you need to plan your wedding',
    'https://planning.wedding?ref=producthunt',
    'public/images/products/thumbnails/4_Wedding-Planning-Assistant.webp',
    0
),(
    '5',
    '2020-05-10 07:00:00',
    'Jump In Meeting',
    'Connect to your conference calls from the menu bar',
    'https://jumpinm.com?ref=producthunt',
    'public/images/products/thumbnails/5_Jump-In-Meeting.webp',
    0
),(
    '6',
    '2020-05-08 19:45:51',
    'ShopSavvy for Chrome',
    'Automatically compare prices between over 30,000+ retailers.',
    'https://chrome.google.com/webstore/detail/shopsavvy/megchchilhekbbnfcklodmndefbhkbco?ref=producthunt',
    'public/images/products/thumbnails/6_ShopSavvy-for-Chrome.webp',
    0
),(
    '7',
    '2020-05-10 07:00:00',
    'Meeter',
    'Hop in and out of calls, directly from your menu bar',
    'https://trymeeter.com/?ref=producthunt',
    'public/images/products/thumbnails/7_Meeter.webp',
    0
),(
    '8',
    '2020-05-06 06:40:19',
    'OffScreen 2.0',
    'Less screen time, more focus.',
    'https://apps.apple.com/us/app/offscreen-less-screen-time/id1474340105?pt=119361776&ct=ph&mt=8&ref=producthunt&at=1000l6eA',
    'public/images/products/thumbnails/8_OffScreen-2.0.webp',
    0
),(
    '9',
    '2020-05-06 12:52:02',
    'ScrollTrotter',
    'How many miles have you scrolled today?',
    'https://chrome.google.com/webstore/detail/scrolltrotter/mppejknbhapogefdpekbpalahphlhgdm?ref=producthunt',
    'public/images/products/thumbnails/9_ScrollTrotter.webp',
    0
),(
    '10',
    '2020-05-10 08:01:00',
    'Calendarist',
    'Time blocking companion for Google Calendar',
    'https://trycalendarist.com?ref=producthunt',
    'public/images/products/thumbnails/10_Calendarist.webp',
    0
);


INSERT INTO `articles`(
    `article_id`,
    `product_id`,
    `content`,
    `media`
)
VALUES(
    '1',
    '1',
    'Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It\'s totally free and it relies on your local bookmarks, you don\'t have to create an account.',
    '["public/images/products/1_Rewind_0.webp","public/images/products/1_Rewind_1.webp","public/images/products/1_Rewind_2.webp","public/images/products/1_Rewind_3.webp","public/images/products/1_Rewind_4.webp",]'
),(
    '2',
    '2',
    'Buy For Life is a crowdsourced platform to discuss and discover long-lasting and sustainable products.',
    '["public/images/products/2_Buy-For-Life_0.webp","public/images/products/2_Buy-For-Life_1.webp","public/images/products/2_Buy-For-Life_2.webp","public/images/products/2_Buy-For-Life_3.webp","public/images/products/2_Buy-For-Life_4.webp","public/images/products/2_Buy-For-Life_5.webp",]'
),(
    '3',
    '3',
    'Remoty help teams reach their full potential with powerful time-tracking and progress update workflow in Slack.',
    '["public/images/products/3_Remoty_0.webp","public/images/products/3_Remoty_1.webp","public/images/products/3_Remoty_2.webp","public/images/products/3_Remoty_3.webp","public/images/products/3_Remoty_4.webp","public/images/products/3_Remoty_5.webp","public/images/products/3_Remoty_6.webp",]'
),(
    '4',
    '4',
    'WA for everyone who plans the wedding and wedding professionals. 🥑 Useful tools of the wedding projects 💪🏼 Collaborate in real-time 🎯 Cloud storage, easy sharing 🚀 Marketing tools for vendors and venues 🌻 Multiple languages supported 😎 Security first!',
    '["public/images/products/4_Wedding-Planning-Assistant_0.webp","public/images/products/4_Wedding-Planning-Assistant_1.webp","public/images/products/4_Wedding-Planning-Assistant_2.webp","public/images/products/4_Wedding-Planning-Assistant_3.webp","public/images/products/4_Wedding-Planning-Assistant_4.webp","public/images/products/4_Wedding-Planning-Assistant_5.webp","public/images/products/4_Wedding-Planning-Assistant_6.webp","public/images/products/4_Wedding-Planning-Assistant_7.webp","public/images/products/4_Wedding-Planning-Assistant_8.webp",]'
),(
    '5',
    '5',
    'Join conference calls in 1 sec. Usually, it takes about a minute to find the right URL and connect to the meeting. Time to change it. Especially right now.',
    '["public/images/products/5_Jump-In-Meeting_0.webp","public/images/products/5_Jump-In-Meeting_1.webp","public/images/products/5_Jump-In-Meeting_2.webp","public/images/products/5_Jump-In-Meeting_3.webp","public/images/products/5_Jump-In-Meeting_4.webp","public/images/products/5_Jump-In-Meeting_5.webp","public/images/products/5_Jump-In-Meeting_6.webp",]'
),(
    '6',
    '6',
    'Check the price automatically at over 30,000 retailers instantly when you visit any product. Know every retailer\'s price before choosing which to buy from. Important details like arrival date and estimated shipping cost are also shown, compare it all!',
    '["public/images/products/6_ShopSavvy-for-Chrome_0.webp","public/images/products/6_ShopSavvy-for-Chrome_1.webp","public/images/products/6_ShopSavvy-for-Chrome_2.webp","public/images/products/6_ShopSavvy-for-Chrome_3.webp","public/images/products/6_ShopSavvy-for-Chrome_4.webp","public/images/products/6_ShopSavvy-for-Chrome_5.webp",]'
),(
    '7',
    '7',
    '9to5Mac featured productivity app Was it hangouts or zoom? Personal or work calendar? Cut through the noise by simply connecting your calendar, and Meeter will automatically pull all your upcoming calls and let you manage them in one place.',
    '["public/images/products/7_Meeter_0.webp","public/images/products/7_Meeter_1.webp","public/images/products/7_Meeter_2.webp","public/images/products/7_Meeter_3.webp",]'
),(
    '8',
    '8',
    'OffScreen 2.0 has a major update to help people focus on what matters when you working/studying from home. Less screen time can reduce your anxiety obviously. Pomodoro timer, Focus data analysis, Screen time calendar... and many more can improve your workflow',
    '["public/images/products/8_OffScreen-2.0_0.webp","public/images/products/8_OffScreen-2.0_1.webp","public/images/products/8_OffScreen-2.0_2.webp","public/images/products/8_OffScreen-2.0_3.webp","public/images/products/8_OffScreen-2.0_4.webp","public/images/products/8_OffScreen-2.0_5.webp","public/images/products/8_OffScreen-2.0_6.webp","public/images/products/8_OffScreen-2.0_7.webp","public/images/products/8_OffScreen-2.0_8.webp","public/images/products/8_OffScreen-2.0_9.webp","public/images/products/8_OffScreen-2.0_10.webp",]'
),(
    '9',
    '9',
    'We all do a lot of scrolling in our browsers. If you could convert pixels to mi/km, how far would you scroll each day? This extension attempts to answer that question. (And maybe help us think more about standing up and logging some actual miles.)',
    '["public/images/products/9_ScrollTrotter_0.webp","public/images/products/9_ScrollTrotter_1.webp","public/images/products/9_ScrollTrotter_2.webp","public/images/products/9_ScrollTrotter_3.webp",]'
),(
    '10',
    '10',
    'A free time blocking app that works with Google Calendar. Calendarist gives you a clear picture of your daily life and keeps you on track to reach your goals.',
    '["public/images/products/10_Calendarist_0.webp","public/images/products/10_Calendarist_1.webp","public/images/products/10_Calendarist_2.webp","public/images/products/10_Calendarist_3.webp","public/images/products/10_Calendarist_4.webp",]'
);

COMMIT;