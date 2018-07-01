<?php
namespace IdealCode\Core\Observer\Checkout;

class ControllerActionPredispatchCheckoutIndexIndex implements \Magento\Framework\Event\ObserverInterface
{
    /** @var \Magento\Checkout\Helper\Data */
    protected $_helper;

    /** @var \Magento\Framework\Message\ManagerInterface */
    protected $_messageManager;

    /**
     * @param \Magento\Checkout\Helper\Data $helper
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     */
    public function __construct(
        \Magento\Checkout\Helper\Data $helper,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->_helper = $helper;
        $this->_messageManager = $messageManager;
    }

    /**
     * Redirect from checkout page to login if
     * checkout not allowed for guests
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        /** @var \Magento\Checkout\Controller\Index\Index $controllerAction */
        $controllerAction = $observer->getData('controller_action');

        $isAllowedGuest = $this->_helper->isAllowedGuestCheckout($controllerAction->getOnepage()->getQuote());
        if(!$isAllowedGuest && !$controllerAction->getOnepage()->getCustomerSession()->authenticate()) {
            $this->_messageManager->addErrorMessage(__('Guest checkout is disabled.'));
            $controllerAction->getActionFlag()->set('', $controllerAction::FLAG_NO_DISPATCH, true);
        }
    }
}
