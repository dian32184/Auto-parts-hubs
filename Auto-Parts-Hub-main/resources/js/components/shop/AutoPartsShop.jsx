import { useState, Suspense, lazy } from 'react';
import '../../../css/shop.css';

// Lazy load components
const ShopHomePage = lazy(() => import('./ShopHomePage'));
const CategoryPage = lazy(() => import('./CategoryPage'));
const SubcategoryPage = lazy(() => import('./SubcategoryPage'));

// Loading component
function LoadingSpinner() {
  return (
    <div className="flex items-center justify-center min-h-screen">
      <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
    </div>
  );
}

export function AutoPartsShop() {
  const [currentView, setCurrentView] = useState('shop');
  const [selectedCategory, setSelectedCategory] = useState(null);
  const [selectedSubcategory, setSelectedSubcategory] = useState(null);

  const handleCategorySelect = (category) => {
    setSelectedCategory(category);
    setCurrentView('category');
  };

  const handleSubcategorySelect = (subcategory) => {
    setSelectedSubcategory(subcategory);
    setCurrentView('subcategory');
  };

  const handleBack = () => {
    if (currentView === 'subcategory') {
      setCurrentView('category');
      setSelectedSubcategory(null);
    } else if (currentView === 'category') {
      setCurrentView('shop');
      setSelectedCategory(null);
    }
  };

  return (
    <div className="bg-gray-50 min-h-screen">
      <Suspense fallback={<LoadingSpinner />}>
        {currentView === 'shop' && <ShopHomePage onCategorySelect={handleCategorySelect} />}
        {currentView === 'category' && selectedCategory && (
          <CategoryPage 
            category={selectedCategory} 
            onBack={handleBack} 
            onSubcategorySelect={handleSubcategorySelect}
          />
        )}
        {currentView === 'subcategory' && selectedCategory && selectedSubcategory && (
          <SubcategoryPage 
            category={selectedCategory} 
            subcategory={selectedSubcategory} 
            onBack={handleBack}
          />
        )}
      </Suspense>
    </div>
  );
} 