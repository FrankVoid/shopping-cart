# shopping-cart
- https://github.com/hippocharging/assessment

# Backend(Laravel):
Laravel 12, MySQL

# Data Management and Features:

- Full CRUD for all entities
- RESTful API
- Data validation
- Database migrations
- Model relationships
- JSON responses
- Error handling

# Project Structure
Models
- Item: Manages products
- Customer: Manages customers
- Cart: Manages shopping carts
- CartItem: Relationship between carts and items
- Address: Manages shipping addresses

Controllers
- ItemController: CRUD for products
- CustomerController: CRUD for customers
- CartController: Manages shopping carts
- CartItemController: Manages cart items
- AddressController: CRUD for addresses
- ShippingController: Simulates a shipping API (EndPoint) 
- PaymentController: Simulates a payment API (EndPoint)

# API Routes

// Products
- GET    /api/items
- POST   /api/items
- GET    /api/items/{id}
- PUT    /api/items/{id}
- DELETE /api/items/{id}

// Customers
- GET    /api/customers
- POST   /api/customers
- GET    /api/customers/{id}
- PUT    /api/customers/{id}
- DELETE /api/customers/{id}

// Carts
- GET    /api/carts
- POST   /api/carts
- GET    /api/carts/{id}
- PUT    /api/carts/{id}
- DELETE /api/carts/{id}

// Addresses
- GET    /api/addresses
- POST   /api/addresses
- GET    /api/addresses/{id}
- PUT    /api/addresses/{id}
- DELETE /api/addresses/{id}

// Services
- POST   /api/shipping
- POST   /api/payment

# Frontend(VueJs)

Vuejs
 - Composition API
 - Axios for API Call
 - Vue Router for navigation
 - Error Handling
 - 
# Completed Features

- Item functionality (HomeView)
    - Product listing
    - Stock updating when a product is added to cart
    - API calls
- Cart functionality (partially implemented)
    - API calls
    - Add Items when user click add in ItemView (HomeView)
    - Update quantities
    - Real-time calculations (Subtotal, Taxes, Total)
    - sending data to Checkout (Router.push Query)
- Checkout process(Eartly implemented)
    - Customer information form
    - Reciving data from CartView (Router.push Query)
    - API calls
# Incomplete Features
- PaymetView.
- Shipping Calculation
- Storing address, customer
- Update status in Items, Cart, CartItem
- delete productos from cart and update items
- reduce the quantity of items in cart


