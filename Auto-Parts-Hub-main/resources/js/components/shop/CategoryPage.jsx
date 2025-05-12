import { memo } from 'react';

const SubcategoryCard = memo(({ subcategory, onClick }) => (
  <div className="category-card" onClick={() => onClick(subcategory)}>
    <img 
      src={subcategory.image} 
      alt={subcategory.name} 
      className="w-full h-[200px] object-cover rounded-lg shadow-md"
      loading="lazy"
    />
    <h2 className="text-xl font-bold mt-4">{subcategory.name}</h2>
  </div>
));

function CategoryPage({ category, onBack, onSubcategorySelect }) {
  const subcategories = category.type === 'motor' ? [
    { id: 1, name: 'Stator', image: '/api/placeholder/300/200' },
    { id: 2, name: 'Rotor', image: '/api/placeholder/300/200' },
    { id: 3, name: 'Windings', image: '/api/placeholder/300/200' },
    { id: 4, name: 'Shaft', image: '/api/placeholder/300/200' },
    { id: 5, name: 'Bearings', image: '/api/placeholder/300/200' },
    { id: 6, name: 'Casing/Housing', image: '/api/placeholder/300/200' }
  ] : [
    { id: 7, name: 'Pistons', image: '/api/placeholder/300/200' },
    { id: 8, name: 'Crankshaft', image: '/api/placeholder/300/200' },
    { id: 9, name: 'Cylinder Head', image: '/api/placeholder/300/200' },
    { id: 10, name: 'Brake Pads', image: '/api/placeholder/300/200' },
    { id: 11, name: 'Brake Rotors', image: '/api/placeholder/300/200' },
    { id: 12, name: 'Brake Calipers', image: '/api/placeholder/300/200' }
  ];

  return (
    <div className="container mx-auto px-4 py-12">
      <button onClick={onBack} className="mb-8 text-blue-600 hover:text-blue-800 flex items-center">
        <span className="mr-2">←</span> Back
      </button>
      <h1 className="text-4xl font-bold mb-12">{category.name}</h1>
      <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
        {subcategories.map((subcategory) => (
          <SubcategoryCard 
            key={subcategory.id} 
            subcategory={subcategory} 
            onClick={onSubcategorySelect}
          />
        ))}
      </div>
    </div>
  );
}

export default memo(CategoryPage); 