<?php

declare(strict_types=1);

namespace Lightspeed;

use Lightspeed\ApiResource\Account;
use Lightspeed\ApiResource\Account\MetaFields as AccountMetaFields;
use Lightspeed\ApiResource\Account\Permissions;
use Lightspeed\ApiResource\Account\RateLimit;
use Lightspeed\ApiResource\AdditionalCosts;
use Lightspeed\ApiResource\ApiResourceAttributes;
use Lightspeed\ApiResource\ApiResourceDashboard;
use Lightspeed\ApiResource\ApiResourceDeliveryDates;
use Lightspeed\ApiResource\ApiResourceDiscountRules;
use Lightspeed\ApiResource\ApiResourceDiscounts;
use Lightspeed\ApiResource\ApiResourceEvents;
use Lightspeed\ApiResource\ApiResourceExternalServices;
use Lightspeed\ApiResource\ApiResourceFiles;
use Lightspeed\ApiResource\ApiResourceFiltersValues;
use Lightspeed\ApiResource\ApiResourceGroupsCustomers;
use Lightspeed\ApiResource\ApiResourceLanguages;
use Lightspeed\ApiResource\ApiResourceLocations;
use Lightspeed\ApiResource\ApiResourceMetaFields;
use Lightspeed\ApiResource\ApiResourcePaymentMethods;
use Lightspeed\ApiResource\ApiResourceRedirects;
use Lightspeed\ApiResource\ApiResourceReturns;
use Lightspeed\ApiResource\ApiResourceReviews;
use Lightspeed\ApiResource\ApiResourceSets;
use Lightspeed\ApiResource\ApiResourceShipments;
use Lightspeed\ApiResource\ApiResourceShippingMethods;
use Lightspeed\ApiResource\ApiResourceShop;
use Lightspeed\ApiResource\ApiResourceSubscriptions;
use Lightspeed\ApiResource\ApiResourceSuppliers;
use Lightspeed\ApiResource\ApiResourceTags;
use Lightspeed\ApiResource\ApiResourceTaxes;
use Lightspeed\ApiResource\ApiResourceTextpages;
use Lightspeed\ApiResource\ApiResourceTickets;
use Lightspeed\ApiResource\ApiResourceTime;
use Lightspeed\ApiResource\ApiResourceTypes;
use Lightspeed\ApiResource\ApiResourceVariants;
use Lightspeed\ApiResource\ApiResourceWebhooks;
use Lightspeed\ApiResource\Blogs;
use Lightspeed\ApiResource\Blogs\Articles;
use Lightspeed\ApiResource\Blogs\Comments;
use Lightspeed\ApiResource\Blogs\Tags as BlogsTags;
use Lightspeed\ApiResource\Brands;
use Lightspeed\ApiResource\Brands\ApiResourceBrandsImage as BrandsImage;
use Lightspeed\ApiResource\Catalog;
use Lightspeed\ApiResource\Categories;
use Lightspeed\ApiResource\Categories\Image as CategoriesImage;
use Lightspeed\ApiResource\Categories\Products as CategoryProducts;
use Lightspeed\ApiResource\Categories\Products\Bulk;
use Lightspeed\ApiResource\Checkouts;
use Lightspeed\ApiResource\Checkouts\Order;
use Lightspeed\ApiResource\Checkouts\PaymentMethods as CheckoutsPaymentMethods;
use Lightspeed\ApiResource\Checkouts\Products as CheckoutProducts;
use Lightspeed\ApiResource\Checkouts\ShipmentMethods;
use Lightspeed\ApiResource\Checkouts\Validate;
use Lightspeed\ApiResource\Contacts;
use Lightspeed\ApiResource\Countries;
use Lightspeed\ApiResource\Customers;
use Lightspeed\ApiResource\Customers\Login;
use Lightspeed\ApiResource\Customers\MetaFields as CustomersMetaFields;
use Lightspeed\ApiResource\Customers\Tokens;
use Lightspeed\ApiResource\Filters;
use Lightspeed\ApiResource\Groups;
use Lightspeed\ApiResource\Invoices;
use Lightspeed\ApiResource\Invoices\ApiResourceInvoicesItems;
use Lightspeed\ApiResource\Invoices\ApiResourceInvoicesMetaFields as InvoicesMetaFields;
use Lightspeed\ApiResource\Orders;
use Lightspeed\ApiResource\Orders\ApiResourceOrdersCredit;
use Lightspeed\ApiResource\Orders\ApiResourceOrdersCustomStatuses;
use Lightspeed\ApiResource\Orders\ApiResourceOrdersEvents;
use Lightspeed\ApiResource\Orders\ApiResourceOrdersMetaFields as OrdersMetaFields;
use Lightspeed\ApiResource\Orders\ApiResourceOrdersProducts as OrdersProducts;
use Lightspeed\ApiResource\Products;
use Lightspeed\ApiResource\Products\ApiResourceProductsAttributes;
use Lightspeed\ApiResource\Products\ApiResourceProductsFilterValues as ProductsFilterValues;
use Lightspeed\ApiResource\Products\ApiResourceProductsImages;
use Lightspeed\ApiResource\Products\ApiResourceProductsMetaFields as ProductsMetaFields;
use Lightspeed\ApiResource\Products\ApiResourceProductsRelations;
use Lightspeed\ApiResource\Quotes;
use Lightspeed\ApiResource\Quotes\ApiResourceQuotesConvert;
use Lightspeed\ApiResource\Quotes\ApiResourceQuotesPaymentMethods as QuotesPaymentMethods;
use Lightspeed\ApiResource\Quotes\ApiResourceQuotesProducts as QuotesProducts;
use Lightspeed\ApiResource\Quotes\ApiResourceQuotesShippingMethods as QuotesShippingMethods;
use Lightspeed\ApiResource\Shipments\ApiResourceShipmentsMetaFields as ShipmentsMetaFields;
use Lightspeed\ApiResource\Shipments\ApiResourceShipmentsProducts as ShipmentsProducts;
use Lightspeed\ApiResource\ShippingMethods\ApiResourceShippingMethodsCountries as ShippingMethodsCountries;
use Lightspeed\ApiResource\ShippingMethods\ApiResourceShippingMethodsValues;
use Lightspeed\ApiResource\Shop\ApiResourceShopCompany;
use Lightspeed\ApiResource\Shop\ApiResourceShopJavascript;
use Lightspeed\ApiResource\Shop\ApiResourceShopLimits;
use Lightspeed\ApiResource\Shop\ApiResourceShopMetaFields as ShopMetaFields;
use Lightspeed\ApiResource\Shop\ApiResourceShopScripts;
use Lightspeed\ApiResource\Shop\ApiResourceShopSettings;
use Lightspeed\ApiResource\Shop\ApiResourceShopTracking;
use Lightspeed\ApiResource\Shop\ApiResourceShopWebsite;
use Lightspeed\ApiResource\Tags\ApiResourceTagsProducts as TagsProducts;
use Lightspeed\ApiResource\Taxes\ApiResourceTaxesOverrides;
use Lightspeed\ApiResource\Theme\ApiResourceThemeCategories as ThemeCategories;
use Lightspeed\ApiResource\Theme\ApiResourceThemeProducts as ThemeProducts;
use Lightspeed\ApiResource\Tickets\ApiResourceTicketsMessages;
use Lightspeed\ApiResource\Types\ApiResourceTypesAttributes;
use Lightspeed\ApiResource\Variants\ApiResourceVariantsBulk;
use Lightspeed\ApiResource\Variants\ApiResourceVariantsImage as VariantsImage;
use Lightspeed\ApiResource\Variants\ApiResourceVariantsMetafields as VariantsMetaFields;
use Lightspeed\ApiResource\Variants\ApiResourceVariantsMovements;

final class ApiClient
{
    public const CLIENT_VERSION = '1.9.1';
    public const SERVER_HOST_LOCAL = 'https://api.webshopapp.dev/';
    public const SERVER_HOST_LIVE = 'https://api.webshopapp.com/';
    public const SERVER_EU1_LIVE = 'https://api.webshopapp.com/';
    public const SERVER_US1_LIVE = 'https://api.shoplightspeed.com/';

    private int $apiCallsMade = 0;
    private array $responseHeaders = [];

    public ?Account $account = null;
    public ?AccountMetaFields $accountMetaFields = null;
    public ?Permissions $accountPermissions = null;
    public ?RateLimit $accountRateLimit = null;
    public ?AdditionalCosts $additionalCosts = null;
    public ?ApiResourceAttributes $attributes = null;
    public ?Blogs $blogs = null;
    public ?Articles $blogsArticles = null;
    public ?CategoriesImage $blogsArticlesImage = null;
    public ?BlogsTags $blogsArticlesTags = null;
    public ?Comments $blogsComments = null;
    public ?BlogsTags $blogsTags = null;
    public ?Brands $brands = null;
    public ?BrandsImage $brandsImage = null;
    public ?Catalog $catalog = null;
    public ?Categories $categories = null;
    public ?CategoriesImage $categoriesImage = null;
    public ?CategoryProducts $categoriesProducts = null;
    public ?Bulk $categoriesProductsBulk = null;
    public ?Checkouts $checkouts = null;
    public ?Order $checkoutsOrder = null;
    public ?CheckoutsPaymentMethods $checkoutsPaymentMethods = null;
    public ?CheckoutProducts $checkoutsProducts = null;
    public ?ShipmentMethods $checkoutsShipmentMethods = null;
    public ?Validate $checkoutsValidate = null;
    public ?Contacts $contacts = null;
    public ?Countries $countries = null;
    public ?Customers $customers = null;
    public ?Login $customersLogin = null;
    public ?CustomersMetaFields $customersMetaFields = null;
    public ?Tokens $customersTokens = null;
    public ?ApiResourceDashboard $dashboard = null;
    public ?ApiResourceDeliveryDates $deliverydates = null;
    public ?ApiResourceDiscountRules $discountrules = null;
    public ?ApiResourceDiscounts $discounts = null;
    public ?ApiResourceEvents $events = null;
    public ?ApiResourceExternalServices $externalServices = null;
    public ?ApiResourceFiles $files = null;
    public ?Filters $filters = null;
    public ?ApiResourceFiltersValues $filtersValues = null;
    public ?Groups $groups = null;
    public ?ApiResourceGroupsCustomers $groupsCustomers = null;
    public ?Invoices $invoices = null;
    public ?ApiResourceInvoicesItems $invoicesItems = null;
    public ?InvoicesMetaFields $invoicesMetafields = null;
    public ?ApiResourceLanguages $languages = null;
    public ?ApiResourceLocations $locations = null;
    public ?ApiResourceMetaFields $metafields = null;
    public ?Orders $orders = null;
    public ?ApiResourceOrdersCredit $ordersCredit = null;
    public ?OrdersMetaFields $ordersMetafields = null;
    public ?OrdersProducts $ordersProducts = null;
    public ?ApiResourceOrdersCustomStatuses $ordersCustomstatuses = null;
    public ?ApiResourceOrdersEvents $ordersEvents = null;
    public ?ApiResourcePaymentMethods $paymentmethods = null;
    public ?Products $products = null;
    public ?ApiResourceProductsAttributes $productsAttributes = null;
    public ?ProductsFilterValues $productsFiltervalues = null;
    public ?ApiResourceProductsImages $productsImages = null;
    public ?ProductsMetaFields $productsMetafields = null;
    public ?ApiResourceProductsRelations $productsRelations = null;
    public ?Quotes $quotes = null;
    public ?ApiResourceQuotesConvert $quotesConvert = null;
    public ?QuotesPaymentMethods $quotesPaymentmethods = null;
    public ?QuotesProducts $quotesProducts = null;
    public ?QuotesShippingMethods $quotesShippingmethods = null;
    public ?ApiResourceRedirects $redirects = null;
    public ?ApiResourceReturns $returns = null;
    public ?ApiResourceReviews $reviews = null;
    public ?ApiResourceSets $sets = null;
    public ?ApiResourceShipments $shipments = null;
    public ?ShipmentsMetaFields $shipmentsMetafields = null;
    public ?ShipmentsProducts $shipmentsProducts = null;
    public ?ApiResourceShippingMethods $shippingmethods = null;
    public ?ShippingMethodsCountries $shippingmethodsCountries = null;
    public ?ApiResourceShippingMethodsValues $shippingmethodsValues = null;
    public ?ApiResourceShop $shop = null;
    public ?ApiResourceShopCompany $shopCompany = null;
    public ?ApiResourceShopJavascript $shopJavascript = null;
    public ?ApiResourceShopLimits $shopLimits = null;
    public ?ShopMetaFields $shopMetafields = null;
    public ?ApiResourceShopScripts $shopScripts = null;
    public ?ApiResourceShopSettings $shopSettings = null;
    public ?ApiResourceShopTracking $shopTracking = null;
    public ?ApiResourceShopWebsite $shopWebsite = null;
    public ?ApiResourceSubscriptions $subscriptions = null;
    public ?ApiResourceSuppliers $suppliers = null;
    public ?ApiResourceTags $tags = null;
    public ?TagsProducts $tagsProducts = null;
    public ?ApiResourceTaxes $taxes = null;
    public ?ApiResourceTaxesOverrides $taxesOverrides = null;
    public ?ApiResourceTextpages $textpages = null;
    public ?ThemeCategories $themeCategories = null;
    public ?ThemeProducts $themeProducts = null;
    public ?ApiResourceTickets $tickets = null;
    public ?ApiResourceTicketsMessages $ticketsMessages = null;
    public ?ApiResourceTime $time = null;
    public ?ApiResourceTypes $types = null;
    public ?ApiResourceTypesAttributes $typesAttributes = null;
    public ?ApiResourceVariants $variants = null;
    public ?VariantsImage $variantsImage = null;
    public ?VariantsMetaFields $variantsMetafields = null;
    public ?ApiResourceVariantsBulk $variantsBulk = null;
    public ?ApiResourceVariantsMovements $variantsMovements = null;
    public ?ApiResourceWebhooks $webhooks = null;

    /**
     * @throws ApiException
     */
    public function __construct(
        private readonly ?string $apiServer,
        private readonly ?string $apiKey,
        private readonly ?string $apiSecret,
        private readonly ?string $apiLanguage,
    ) {
        if (!function_exists('curl_init')) {
            throw new ApiException('ApiClient needs the CURL PHP extension.');
        }
        if (!function_exists('json_decode')) {
            throw new ApiException('ApiClient needs the JSON PHP extension.');
        }

        $this->registerResources();
    }

    public function getApiLanguage(): ?string
    {
        return $this->apiLanguage;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function getApiSecret(): ?string
    {
        return $this->apiSecret;
    }

    public function getApiServer(): ?string
    {
        return $this->apiServer;
    }

    public function getApiCallsMade(): int
    {
        return $this->apiCallsMade;
    }

    public function getResponseHeaders(): array
    {
        return $this->responseHeaders;
    }

    private function setResponseHeaders(array $responseHeaders): void
    {
        $this->responseHeaders = $responseHeaders;
    }

    /**
     * @throws ApiException
     */
    private function checkLoginCredentials(): void
    {
        if (strlen((string) $this->getApiKey()) !== 32 || strlen((string) $this->getApiSecret()) !== 32) {
            throw new ApiException('Invalid login credentials.');
        }
        if (strlen((string) $this->getApiLanguage()) !== 2) {
            throw new ApiException('Invalid API language.');
        }
    }

    private function registerResources(): void
    {
        $this->account = new Account($this);
        $this->accountMetaFields = new AccountMetaFields($this);
        $this->accountPermissions = new Permissions($this);
        $this->accountRateLimit = new RateLimit($this);
        $this->additionalCosts = new AdditionalCosts($this);
        $this->attributes = new ApiResourceAttributes($this);
        $this->blogs = new Blogs($this);
        $this->blogsArticles = new Articles($this);
        $this->blogsArticlesImage = new CategoriesImage($this);
        $this->blogsArticlesTags = new BlogsTags($this);
        $this->blogsComments = new Comments($this);
        $this->blogsTags = new BlogsTags($this);
        $this->brands = new Brands($this);
        $this->brandsImage = new BrandsImage($this);
        $this->catalog = new Catalog($this);
        $this->categories = new Categories($this);
        $this->categoriesImage = new CategoriesImage($this);
        $this->categoriesProducts = new Products($this);
        $this->categoriesProductsBulk = new Bulk($this);
        $this->checkouts = new Checkouts($this);
        $this->checkoutsOrder = new Order($this);
        $this->checkoutsPaymentMethods = new CheckoutsPaymentMethods($this);
        $this->checkoutsProducts = new Products($this);
        $this->checkoutsShipmentMethods = new ShipmentMethods($this);
        $this->checkoutsValidate = new Validate($this);
        $this->contacts = new Contacts($this);
        $this->countries = new Countries($this);
        $this->customers = new Customers($this);
        $this->customersLogin = new Login($this);
        $this->customersMetaFields = new AccountMetaFields($this);
        $this->customersTokens = new Tokens($this);
        $this->dashboard = new ApiResourceDashboard($this);
        $this->deliverydates = new ApiResourceDeliveryDates($this);
        $this->discountrules = new ApiResourceDiscountRules($this);
        $this->discounts = new ApiResourceDiscounts($this);
        $this->events = new ApiResourceEvents($this);
        $this->externalServices = new ApiResourceExternalServices($this);
        $this->files = new ApiResourceFiles($this);
        $this->filters = new Filters($this);
        $this->filtersValues = new ApiResourceFiltersValues($this);
        $this->groups = new Groups($this);
        $this->groupsCustomers = new ApiResourceGroupsCustomers($this);
        $this->invoices = new Invoices($this);
        $this->invoicesItems = new ApiResourceInvoicesItems($this);
        $this->invoicesMetafields = new InvoicesMetaFields($this);
        $this->languages = new ApiResourceLanguages($this);
        $this->locations = new ApiResourceLocations($this);
        $this->metafields = new ApiResourceMetaFields($this);
        $this->orders = new Orders($this);
        $this->ordersCredit = new ApiResourceOrdersCredit($this);
        $this->ordersMetafields = new OrdersMetaFields($this);
        $this->ordersProducts = new OrdersProducts($this);
        $this->ordersCustomstatuses = new ApiResourceOrdersCustomStatuses($this);
        $this->ordersEvents = new ApiResourceOrdersEvents($this);
        $this->paymentmethods = new ApiResourcePaymentMethods($this);
        $this->products = new Products($this);
        $this->productsAttributes = new ApiResourceProductsAttributes($this);
        $this->productsFiltervalues = new ProductsFilterValues($this);
        $this->productsImages = new ApiResourceProductsImages($this);
        $this->productsMetafields = new ProductsMetaFields($this);
        $this->productsRelations = new ApiResourceProductsRelations($this);
        $this->quotes = new Quotes($this);
        $this->quotesConvert = new ApiResourceQuotesConvert($this);
        $this->quotesPaymentmethods = new QuotesPaymentMethods($this);
        $this->quotesProducts = new QuotesProducts($this);
        $this->quotesShippingmethods = new QuotesShippingMethods($this);
        $this->redirects = new ApiResourceRedirects($this);
        $this->returns = new ApiResourceReturns($this);
        $this->reviews = new ApiResourceReviews($this);
        $this->sets = new ApiResourceSets($this);
        $this->shipments = new ApiResourceShipments($this);
        $this->shipmentsMetafields = new ShipmentsMetaFields($this);
        $this->shipmentsProducts = new ShipmentsProducts($this);
        $this->shippingmethods = new ApiResourceShippingMethods($this);
        $this->shippingmethodsCountries = new ShippingMethodsCountries($this);
        $this->shippingmethodsValues = new ApiResourceShippingMethodsValues($this);
        $this->shop = new ApiResourceShop($this);
        $this->shopCompany = new ApiResourceShopCompany($this);
        $this->shopJavascript = new ApiResourceShopJavascript($this);
        $this->shopLimits = new ApiResourceShopLimits($this);
        $this->shopMetafields = new ShopMetaFields($this);
        $this->shopScripts = new ApiResourceShopScripts($this);
        $this->shopSettings = new ApiResourceShopSettings($this);
        $this->shopTracking = new ApiResourceShopTracking($this);
        $this->shopWebsite = new ApiResourceShopWebsite($this);
        $this->subscriptions = new ApiResourceSubscriptions($this);
        $this->suppliers = new ApiResourceSuppliers($this);
        $this->tags = new ApiResourceTags($this);
        $this->tagsProducts = new TagsProducts($this);
        $this->taxes = new ApiResourceTaxes($this);
        $this->taxesOverrides = new ApiResourceTaxesOverrides($this);
        $this->textpages = new ApiResourceTextpages($this);
        $this->themeCategories = new ThemeCategories($this);
        $this->themeProducts = new ThemeProducts($this);
        $this->tickets = new ApiResourceTickets($this);
        $this->ticketsMessages = new ApiResourceTicketsMessages($this);
        $this->time = new ApiResourceTime($this);
        $this->types = new ApiResourceTypes($this);
        $this->typesAttributes = new ApiResourceTypesAttributes($this);
        $this->variants = new ApiResourceVariants($this);
        $this->variantsImage = new VariantsImage($this);
        $this->variantsMetafields = new VariantsMetaFields($this);
        $this->variantsBulk = new ApiResourceVariantsBulk($this);
        $this->variantsMovements = new ApiResourceVariantsMovements($this);
        $this->webhooks = new ApiResourceWebhooks($this);
    }

    /**
     * @param array $params
     */
    private function getUrl(string $resourceUrl, $params = null): string
    {
        $apiHost = null;
        if ($this->apiServer == 'live') {
            $apiHost = self::SERVER_HOST_LIVE;
        } else if ($this->apiServer == 'local') {
            $apiHost = self::SERVER_HOST_LOCAL;
        } else if ($this->apiServer == 'eu1') {
            $apiHost = self::SERVER_EU1_LIVE;
        } else if ($this->apiServer == 'us1') {
            $apiHost = self::SERVER_US1_LIVE;
        }

        $apiHostParts = parse_url($apiHost);
        $resourceUrlParts = parse_url($resourceUrl);

        $apiUrl = $apiHostParts['scheme'] . '://' . $this->getApiKey() . ':' . $this->getApiSecret() . '@' . $apiHostParts['host'] . '/';
        if (isset($apiHostParts['path']) && strlen(trim($apiHostParts['path'], '/'))) {
            $apiUrl .= trim($apiHostParts['path'], '/') . '/';
        }
        $apiUrl .= $this->getApiLanguage() . '/' . $resourceUrlParts['path'] . '.json';

        if (isset($resourceUrlParts['query'])) {
            $apiUrl .= '?' . $resourceUrlParts['query'];
        } else if ($params && is_array($params)) {
            $queryParameters = [];

            foreach ($params as $key => $value) {
                if (!is_array($value)) {
                    $queryParameters[] = $key . '=' . urlencode($value);
                }
            }

            $queryParameters = implode('&', $queryParameters);

            if (!empty($queryParameters)) {
                $apiUrl .= '?' . $queryParameters;
            }
        }

        return $apiUrl;
    }

    /**
     * Invoke the Webshopapp API.
     *
     * @param string $url The resource url (required)
     * @param string $method The http method (default 'get')
     * @param array $payload The query/post data
     *
     * @return mixed The decoded response object
     * @throws ApiException
     */
    private function sendRequest(string $url, string $method, $payload = null, $options = [])
    {
        $this->checkLoginCredentials();

        if ($method == 'post' || $method == 'put') {
            if (!$payload || !is_array($payload)) {
                throw new ApiException('Invalid payload', 100);
            }

            $multipart = array_key_exists('header', $options);

            $header = $multipart ? $options['header'] : 'application/json';

            $curlOptions = [
                CURLOPT_URL => $this->getUrl($url),
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                CURLOPT_HTTPHEADER => ['Content-Type: ' . $header],
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $multipart ? $payload : json_encode($payload, JSON_THROW_ON_ERROR),
            ];
        } else if ($method == 'delete') {
            $curlOptions = [
                CURLOPT_URL => $this->getUrl($url),
                CURLOPT_CUSTOMREQUEST => 'DELETE',
            ];
        } else {
            $curlOptions = [
                CURLOPT_URL => $this->getUrl($url, $payload),
            ];
        }

        $curlOptions += [
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'ApiClient/' . self::CLIENT_VERSION . ' (PHP/' . phpversion() . ')',
            CURLOPT_SSLVERSION => 6,
        ];

        $curlHandle = curl_init();

        curl_setopt_array($curlHandle, $curlOptions);

        $headers = [];

        curl_setopt(
            $curlHandle,
            CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$headers) {
                $length = strlen((string) $header);
                $header = explode(':', (string) $header, 2);

                if (count($header) <= 1) {
                    return $length;
                }

                $header = array_map('trim', $header);
                $headers[$header[0]] = $header[1];

                return $length;
            },
        );

        $responseBody = curl_exec($curlHandle);

        if ($headers) {
            $this->setResponseHeaders($headers);
        }

        if (curl_errno($curlHandle)) {
            $this->handleCurlError($curlHandle);
        }

        $responseBody = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        $responseCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

        curl_close($curlHandle);

        $this->apiCallsMade++;

        if ($responseCode < 200 || $responseCode > 299 || ($responseBody && array_key_exists('error', $responseBody))) {
            $this->handleResponseError($responseCode, $responseBody);
        }

        if ($responseBody && preg_match('/^checkout/i', $url) !== 1) {
            $responseBody = array_shift($responseBody);
        }

        return $responseBody;
    }

    /**
     *
     * @throws ApiException
     */
    private function handleResponseError(
        int $responseCode,
        array $responseBody,
    ): void {
        $errorMessage = 'Unknown error: ' . $responseCode;

        if ($responseBody && array_key_exists('error', $responseBody)) {
            $errorMessage = $responseBody['error']['message'];
        }

        throw new ApiException($errorMessage, $responseCode);
    }

    /**
     * @param resource $curlHandle
     *
     * @throws ApiException
     */
    private function handleCurlError($curlHandle): never
    {
        $errorMessage = 'Curl error: ' . curl_error($curlHandle);

        throw new ApiException($errorMessage, curl_errno($curlHandle));
    }

    /**
     *
     * @throws ApiException
     */
    public function create(string $url, array $payload, array $options = []): array
    {
        return $this->sendRequest($url, 'post', $payload, $options);
    }

    /**
     *
     * @throws ApiException
     */
    public function read(string $url, array $params = []): array|int
    {
        return $this->sendRequest($url, 'get', $params);
    }

    /**
     *
     * @throws ApiException
     */
    public function update(string $url, array $payload, array $options = []): array
    {
        return $this->sendRequest($url, 'put', $payload, $options);
    }

    /**
     *
     * @throws ApiException
     */
    public function delete(string $url): array
    {
        return $this->sendRequest($url, 'delete');
    }
}
