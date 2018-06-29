<?php
namespace IdealCode\Core\Helper\Customer;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /** @var \Magento\Customer\Model\Url */
    protected $_customerUrl;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Customer\Model\Url $customerUrl
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Customer\Model\Url $customerUrl
    ) {
        $this->_customerUrl = $customerUrl;
        parent::__construct($context);
    }

    /**
     * Login url
     *
     * @return string
     */
    public function getLoginUrl()
    {
        return $this->_customerUrl->getLoginUrl();
    }

    /**
     * Logout url
     *
     * @return string
     */
    public function getLogoutUrl()
    {
        return $this->_customerUrl->getLogoutUrl();
    }
}
