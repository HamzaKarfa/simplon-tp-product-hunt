<?php

/**
 * 
 */

declare(strict_types=1);

namespace Controllers;

use Exception;
use Models\Model;

/**
 * 
 */
class ProductHuntAPI extends API
{
    public function runDefault(array $args = []): void
    {
        /* set model, args, ...then call() */
        $this->set($args);

        /* use existing model or load one */
        $this->model ?? $this->loadModel();
        $this->call();
    }

    /**
     *
     */
    public function runProduct(array $args = []): void
    {
        /* set model, args, ...then call() */
        $args['endpoint'] = 'Product';
        $this->set($args);

        /* use existing model or load one */
        $this->model ?? $this->loadModel();
        $this->call();
    }


    /**
     *
     */
    public function runComment(array $args = []): void
    {
        /* set model, args, ...then call() */
        $args['endpoint'] = 'Comment';
        $this->set($args);

        /* use existing model or load one */
        $this->model ?? $this->loadModel();
        $this->call();
    }

    /**
     *
     */
    public function runVote(array $args = []): void
    {
        /* set model, args, ...then call() */
        $args['endpoint'] = 'Vote';
        $this->set($args);

        /* use existing model or load one */
        $this->model ?? $this->loadModel();
        $this->call();
    }

    /**
     * note
     *   Overriding Controller->cache()
     */
    public function cache(): Controller
    {
        if ($this->rendered_page !== '') {
            $cached_file = fopen($this->cache_path, 'w');
            fwrite($cached_file, $this->rendered_page);
            fclose($cached_file);
        }

        return $this;
    }

    /**
     * RESTish API : Register a vote for given user on given product.
     * 
     * @api ProductHuntAPI
     * @endpoint Vote
     *
     * 
     * @query ?controller=ProductHuntAPI&endpoint=Vote&user_id={id}&product_id={id}
     *
     * @return array to be emitted as json by ProductHuntAPI controller
     * 
     * @Example
     * @Response STATUS 200 - application/json
     * OK
     * <pre><code>
     * {
     *   "article_id": 1,
     *   "product_id": 2,
     *   "content": "Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It's totally free and it relies on your local bookmarks, you don't have to create an account.",
     *   "media": "[\"public/images/products/1_Rewind_0.webp\",\"public/images/products/1_Rewind_1.webp\",\"public/images/products/1_Rewind_2.webp\",\"public/images/products/1_Rewind_3.webp\",\"public/images/products/1_Rewind_4.webp\"]"
     * }
     * </code></pre>
     * 
     * @Response STATUS 204 - application/json
     * No Content
     * <pre><code>
     * []
     * </code></pre>
     * 
     * @Response STATUS 400 - application/json
     * Bad Request
     * <pre><code>
     * ['ERROR : missing or invalid parameter product_id']
     * ['ERROR : missing or invalid parameter user_id']
     * </code></pre>
     * 
     * @Response STATUS 500 - application/json
     * Internal Server Error
     * <pre><code>
     * ['ERROR : ...']
     * </code></pre>
     * 
     * @todo Translate PDO/MySQL errors into meaningful response for the
     *       RESTish API.
     * @todo Add a json cache/buffer.
     * @todo Have a look at PDO statement errorInfo().
     * @todo Handle situation where vote has already been cast.
     */
    protected function restPOSTVote(): ?array
    {
        if (!isset($this->args['user_id']) || !is_numeric($this->args['user_id'])) {
            /* Bad Request */
            $this->args['status_code'] = 400;
            return ['ERROR : missing or invalid parameter user_id'];
        }

        if (!isset($this->args['product_id']) || !is_numeric($this->args['product_id'])) {
            /* Bad Request */
            $this->args['status_code'] = 400;
            return ['ERROR : missing or invalid parameter product_id'];
        }

        $user_id = intval($this->args['user_id'] ?? 0);
        $product_id = intval($this->args['product_id'] ?? 0);

        try {
            $results = [$this->model->vote($user_id, $product_id)];

            if (empty($results)) {
                /* Not Found */
                $this->args['status_code'] = 404;
            } else {
                /* OK */
                $this->args['status_code'] = 200;
            }

            /* useful only if you want to do more than emit json */
            // $this->args['data'] = $results;

            return $results;
        } catch (Exception $e) {
            /* Internal Server Error */
            $this->args['status_code'] = 500;
            return [$e->getMessage()];
        }
    }

    /**
     * RESTish API : Get product content associated to a given product id.
     * 
     * @api ProductHuntAPI
     * @endpoint Product
     *
     * 
     * @query ?controller=ProductHuntAPI&endpoint=Product&product_id={id}
     *
     * @return array to be emitted as json by ProductHuntAPI controller
     * 
     * @Example
     * @Response STATUS 200 - application/json
     * OK
     * <pre><code>
     * {
     *   "article_id": 1,
     *   "product_id": 2,
     *   "content": "Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It's totally free and it relies on your local bookmarks, you don't have to create an account.",
     *   "media": "[\"public/images/products/1_Rewind_0.webp\",\"public/images/products/1_Rewind_1.webp\",\"public/images/products/1_Rewind_2.webp\",\"public/images/products/1_Rewind_3.webp\",\"public/images/products/1_Rewind_4.webp\"]"
     * }
     * </code></pre>
     * 
     * @Response STATUS 204 - application/json
     * No Content
     * <pre><code>
     * []
     * </code></pre>
     * 
     * @Response STATUS 400 - application/json
     * Bad Request
     * <pre><code>
     * ['ERROR : missing or invalid parameter product_id']
     * </code></pre>
     * 
     * @Response STATUS 500 - application/json
     * Internal Server Error
     * <pre><code>
     * ['ERROR : ...']
     * </code></pre>
     * 
     * @todo Translate PDO/MySQL errors into meaningful response for the
     *       RESTish API.
     * @todo Add a json cache/buffer.
     * @todo Have a look at PDO statement errorInfo().
     */
    protected function restGETProduct(): ?array
    {

        if (!isset($this->args['product_id']) || !is_numeric($this->args['product_id'])) {
            /* Bad Request */
            $this->args['status_code'] = 400;
            return ['ERROR : missing or invalid parameter product_id'];
        }

        $product_id = intval($this->args['product_id'] ?? 0);

        try {
            $results = $this->model->getProduct($product_id);

            if (empty($results)) {
                /* Not Found */
                $this->args['status_code'] = 404;
            } else {
                /* OK */
                $this->args['status_code'] = 200;
            }

            /* useful only if you want to do more than emit json */
            // $this->args['data'] = $results;

            return $results;
        } catch (Exception $e) {
            /* Internal Server Error */
            $this->args['status_code'] = 500;
            return [$e->getMessage()];
        }
    }

    /**
     * RESTish API : Get most recent products.
     * 
     * @api ProductHuntAPI
     * @endpoint Product
     * @sub-resource Fresh
     *
     * Pagination option is available on this resource.
     * 
     * @query ?controller=ProductHuntAPI&endpoint=Products&sub=Fresh
     * 
     * @optional &maxResults= 
     *           How many products to return (default = 10).
     * 
     * @optional &startAt= 
     *           How many products to skip   (default = 0).
     * 
     * @return array to be emitted as json by ProductHuntAPI controller
     * 
     * @Example
     * @Response STATUS 200 - application/json
     * OK
     * <pre><code>
     * [
     *   {
     *     "product_id": 1,
     *     "name": "Rewind",
     *     "created_at": "2020-05-10 07:01:00",
     *     "website": "https://rewind.netlify.app/?ref=producthunt",
     *     "summary": "Your bookmarks, by date, with thumbnails and instant search",
     *     "thumbnail": "public/images/products/thumbnails/1_Rewind.webp",
     *     "votes_count": 0,
     *     "comments_count": 0
     *   },
     *   {
     *     "product_id": 2,
     *     "name": "Buy For Life",
     *     "created_at": "2020-05-10 07:01:00",
     *     "website": "https://rewind.netlify.app/?ref=producthunt",
     *     "summary": "Your bookmarks, by date, with thumbnails and instant search",
     *     "thumbnail": "public/images/products/thumbnails/2_Buy-For-Life.webp",
     *     "votes_count": 0,
     *     "comments_count": 0
     *   }
     * ] </code></pre>
     * 
     * @Response STATUS 204 - application/json
     * No Content
     * <pre><code>
     * []
     * </code></pre>
     * 
     * @Response STATUS 500 - application/json
     * Internal Server Error
     * <pre><code>
     * ['ERROR : ...']
     * </code></pre>
     * 
     * @todo Translate PDO/MySQL errors into meaningful response for the
     *       RESTish API.
     * @todo Add a json cache/buffer.
     * @todo Have a look at PDO statement errorInfo().
     */
    protected function restGETProductFresh(): ?array
    {
        $count = $this->args['maxResults'] ?? 10;
        $offset = $this->args['startAt'] ?? 0;
        // $order_by = $this->args['orderBy'] ?? 'created_at';

        try {
            $results = $this->model->getFreshProducts($count, $offset);

            if (empty($results)) {
                /* No Content */
                $this->args['status_code'] = 204;
            } else {
                /* OK */
                $this->args['status_code'] = 200;
            }

            /* useful only if you want to do more than emit json */
            // $this->args['data'] = $results;

            return $results;
        } catch (Exception $e) {
            /* Internal Server Error */
            $this->args['status_code'] = 500;
            return [$e->getMessage()];
        }
    }

    /**
     * RESTish API : Get most popular products.
     * 
     * @api ProductHuntAPI
     * @endpoint Product
     * @sub-resource Popular
     *
     * Pagination option is available on this resource.
     * 
     * @query ?controller=ProductHuntAPI&endpoint=Product&sub=Popular
     * 
     * @optional &maxResults= 
     *           How many products to return (default = 10).
     * 
     * @optional &startAt= 
     *           How many products to skip   (default = 0).
     * 
     * @return array to be emitted as json by ProductHuntAPI controller
     * 
     * @Example
     * @Response STATUS 200 - application/json
     * OK
     * <pre><code>
     * [
     *   {
     *     "product_id": 1,
     *     "name": "Rewind",
     *     "created_at": "2020-05-10 07:01:00",
     *     "website": "https://rewind.netlify.app/?ref=producthunt",
     *     "summary": "Your bookmarks, by date, with thumbnails and instant search",
     *     "thumbnail": "public/images/products/thumbnails/1_Rewind.webp",
     *     "votes_count": 0,
     *     "comments_count": 0
     *   },
     *   {
     *     "product_id": 2,
     *     "name": "Buy For Life",
     *     "created_at": "2020-05-10 07:01:00",
     *     "website": "https://rewind.netlify.app/?ref=producthunt",
     *     "summary": "Your bookmarks, by date, with thumbnails and instant search",
     *     "thumbnail": "public/images/products/thumbnails/2_Buy-For-Life.webp",
     *     "votes_count": 0,
     *     "comments_count": 0
     *   }
     * ] </code></pre>
     * 
     * @Response STATUS 204 - application/json
     * No Content
     * <pre><code>
     * []
     * </code></pre>
     * 
     * @Response STATUS 500 - application/json
     * Internal Server Error
     * <pre><code>
     * ['ERROR : ...']
     * </code></pre>
     * 
     * @todo Translate PDO/MySQL errors into meaningful response for the
     *       RESTish API.
     * @todo Add a json cache/buffer.
     * @todo Have a look at PDO statement errorInfo().
     */
    protected function restGETProductPopular(): ?array
    {
        $count = $this->args['maxResults'] ?? 10;
        $offset = $this->args['startAt'] ?? 0;
        // $order_by = $this->args['orderBy'] ?? 'created_at';

        try {
            $results = $this->model->getPopularProducts($count, $offset);

            if (empty($results)) {
                /* No Content */
                $this->args['status_code'] = 204;
            } else {
                /* OK */
                $this->args['status_code'] = 200;
            }

            /* useful only if you want to do more than emit json */
            // $this->args['data'] = $results;

            return $results;
        } catch (Exception $e) {
            /* Internal Server Error */
            $this->args['status_code'] = 500;
            return [$e->getMessage()];
        }
    }
}
