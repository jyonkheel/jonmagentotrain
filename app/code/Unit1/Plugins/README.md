1.7.2: (module name: Unit1_Plugins) Plugins 2
For the class Magento\Catalog\Model\Product and the method getPrice(): Create a plugin that will modify price (afterPlugin).
1. Customize Magento\Theme\Block\Html\Footer class, to replace the body of the getCopyright() method with your implementation.
   Return a hard-coded string: “Customized copyright!”
2. Customize Magento\Theme\Block\Html\Breadcrumbs class, addCrumb() method, so that every crumbName is
transformed into: $crumbName . “(!)”. For this task make it happens twice with After and Before plugins.