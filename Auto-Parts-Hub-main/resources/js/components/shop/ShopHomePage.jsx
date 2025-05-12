import { memo } from 'react';

const popularCategories = [
  {
    id: 1,
    name: 'Engine Parts',
    description: 'High-quality engine components for optimal performance.',
    image: '/api/placeholder/400/320',
    type: 'vehicle'
  },
  {
    id: 2,
    name: 'Brake System',
    description: 'Premium brake parts for maximum safety and reliability.',
    image: '/api/placeholder/400/320',
    type: 'vehicle'
  },
  {
    id: 3,
    name: 'Electrical System',
    description: 'Superior electrical systems for dependable power and protection.',
    image: '/api/placeholder/400/320',
    type: 'vehicle'
  }
];

const mainCategories = [
  {
    id: 4,
    name: 'Motor Parts',
    image: '/api/placeholder/600/500',
    type: 'motor'
  },
  {
    id: 5,
    name: 'Vehicle Parts',
    image: '/api/placeholder/600/500',
    type: 'vehicle'
  }
];

// Memoized category card components
const CategoryCard = memo(({ category, onClick }) => (
  <div className="category-card" onClick={() => onClick(category)}>
    <img 
      src={category.image} 
      alt={category.name} 
      className="w-full h-[220px] object-cover rounded-lg shadow-md"
      loading="lazy"
    />
    <h2 className="text-2xl font-bold mt-4 mb-2">{category.name}</h2>
    <p className="text-gray-600">{category.description}</p>
  </div>
));

const MainCategoryCard = memo(({ category, onClick }) => (
  <div className="main-category-card" onClick={() => onClick(category)}>
    <img 
      src={category.image} 
      alt={category.name} 
      className="w-full h-[400px] object-cover"
      loading="lazy"
    />
    <div className={`main-category-overlay ${category.type}-overlay absolute inset-0 flex items-end p-8`}>
      <h2 className="text-white text-4xl font-bold main-category-title">{category.name}</h2>
    </div>
  </div>
));

function ShopHomePage({ onCategorySelect }) {
  return (
    <div className="container mx-auto px-4 py-12">
      <h1 className="text-4xl font-bold text-center mb-16">Popular Categories</h1>
      
      <div className="grid grid-cols-1 md:grid-cols-3 gap-12 mb-20">
        {popularCategories.map((category) => (
          <CategoryCard 
            key={category.id} 
            category={category} 
            onClick={onCategorySelect}
          />
        ))}
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
        {mainCategories.map((category) => (
          <MainCategoryCard 
            key={category.id} 
            category={category} 
            onClick={onCategorySelect}
          />
        ))}
      </div>
    </div>
  );
}

export default memo(ShopHomePage); 