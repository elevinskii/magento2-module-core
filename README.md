# Core module for all Magento 2 themes

## Features:

What will the module give us?

### Common data provider classes for your UI components

* Ui/Component/DataProvider
* Ui/Component/Form/DataProvider

**Usage in code**

In UI component (folder view/{adminhtml|frontend}/ui_component/):

```
<dataSource name="...">
    <dataProvider name="..." class="DataProviderClass" />
</dataSource>
```

In DI Config (etc/{adminhtml|frontend}/di.xml):

```
<virtualType name="DataProviderClass" type="IdealCode\Core\Ui\Component\DataProvider">
    <arguments>
        <argument name="collection" xsi:type="object">CollectionClass</argument>
    </arguments>
</virtualType>
```
