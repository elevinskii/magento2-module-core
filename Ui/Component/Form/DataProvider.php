<?php
namespace IdealCode\Core\Ui\Component\Form;

class DataProvider extends \IdealCode\Core\Ui\Component\DataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        /** @var \Magento\Framework\Model\AbstractModel $item */
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
        }

        return $this->_loadedData;
    }
}
