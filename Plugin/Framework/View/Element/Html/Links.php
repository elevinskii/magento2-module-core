<?php
namespace IdealCode\Core\Plugin\Framework\View\Element\Html;

class Links
{
    /**
     * Sort links by arguments
     *
     * @param \Magento\Framework\View\Element\Html\Links $subject
     * @param \Magento\Framework\View\Element\Template[] $links
     * @return \Magento\Framework\View\Element\Template[]
     */
    public function afterGetLinks(
        \Magento\Framework\View\Element\Html\Links $subject,
        array $links
    ) {
        usort($links, [$this, 'compare']);
        return $links;
    }

    /**
     * Compare sortOrder in links
     *
     * @param \Magento\Framework\View\Element\Template $firstLink
     * @param \Magento\Framework\View\Element\Template $secondLink
     * @return boolean
     */
    protected function compare($firstLink, $secondLink)
    {
        return $firstLink->getData('sortOrder') < $secondLink->getData('sortOrder');
    }
}
