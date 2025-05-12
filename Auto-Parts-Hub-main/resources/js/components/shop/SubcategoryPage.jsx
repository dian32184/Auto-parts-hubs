import { memo } from 'react';

function SubcategoryPage({ category, subcategory, onBack }) {
  return (
    <div className="container mx-auto px-4 py-12">
      <button onClick={onBack} className="mb-8 text-blue-600 hover:text-blue-800 flex items-center">
        <span className="mr-2">←</span> Back to {category.name}
      </button>
      <h1 className="text-4xl font-bold mb-12">{subcategory.name}</h1>
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        {/* Products will be loaded here */}
      </div>
    </div>
  );
}

export default memo(SubcategoryPage); 