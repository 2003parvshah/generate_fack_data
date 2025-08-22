# This is the python script which I am sending to you: Runn it :
import csv
from faker import Faker
import random
from datetime import datetime

fake = Faker()

# Function to generate random date-time between 2023 and 2025
def generate_random_datetime():
    start_date = datetime(2023, 1, 1)
    end_date = datetime(2025, 12, 31, 23, 59, 59)  # End of 2025
    return fake.date_time_between_dates(datetime_start=start_date, datetime_end=end_date)

# Function to generate dummy data for Customers
def generate_customers(num_records):
    customers = []
    for i in range(num_records):
        customer = {
            "CustomerID": i + 1,  # Start from 1 to ensure sequential IDs
            "Name": fake.name(),
            "Email": fake.email(),
            "CreatedAt": generate_random_datetime().strftime('%Y-%m-%d %H:%M:%S'),
            "Country": random.choice(["USA", "India", "UK", "Germany", "Canada"])
        }
        customers.append(customer)
    return customers

# Function to generate dummy data for Products
def generate_products(num_records):
    products = []
    categories = ["Electronics", "Clothing", "Groceries", "Books", "Furniture"]
    for i in range(num_records):
        product = {
            "ProductID": i + 1,  # Sequential ProductID to match with OrderItems
            "Name": fake.word(),
            "Category": random.choice(categories),
            "Price": round(random.uniform(10, 500), 2),
            "StockQuantity": random.randint(0, 1000)
        }
        products.append(product)
    return products

# Function to generate dummy data for Orders
def generate_orders(customers, num_records):
    orders = []
    statuses = ["Pending", "Shipped", "Delivered", "Cancelled"]
    for i in range(num_records):
        order = {
            "OrderID": i + 1,  # Sequential OrderID to match with OrderItems
            "CustomerID": random.choice(customers)["CustomerID"],
            "OrderDate": generate_random_datetime().strftime('%Y-%m-%d %H:%M:%S'),
            "TotalAmount": round(random.uniform(50, 500), 2),
            "Status": random.choice(statuses)
        }
        orders.append(order)
    return orders

# Function to generate dummy data for OrderItems
def generate_order_items(orders, products, num_records):
    order_items = []
    for i in range(num_records):
        order_item = {
            "OrderItemID": i + 1,  # Sequential OrderItemID
            "OrderID": random.choice(orders)["OrderID"],  # Ensure valid OrderID
            "ProductID": random.choice(products)["ProductID"],  # Ensure valid ProductID
            "Quantity": random.randint(1, 5),
            "Price": round(random.uniform(10, 500), 2)
        }
        order_items.append(order_item)
    return order_items

# Function to generate dummy data for Payments
def generate_payments(orders, num_records):
    payments = []
    statuses = ["Success", "Failed", "Pending"]
    for i in range(num_records):
        payment = {
            "PaymentID": i + 1,  # Sequential PaymentID
            "OrderID": random.choice(orders)["OrderID"],  # Ensure valid OrderID
            "PaymentDate": generate_random_datetime().strftime('%Y-%m-%d %H:%M:%S'),
            "PaymentMethod": random.choice(["Credit Card", "PayPal"]),
            "Amount": round(random.uniform(50, 2000), 2),
            "Status": random.choice(statuses)
        }
        payments.append(payment)
    return payments

# Generate data
num_records = 1000000  # Generate 100,0000 records for each table (you can scale it up)

# Generate data for each table
customers = generate_customers(num_records)
products = generate_products(1000)  # Assuming 1000 unique products
orders = generate_orders(customers, num_records)
order_items = generate_order_items(orders, products, num_records * 2)  # 2 order items per order
payments = generate_payments(orders, num_records)

# Write data to CSV files
def write_to_csv(data, filename):
    with open(filename, mode='w', newline='', encoding='utf-8') as file:
        writer = csv.DictWriter(file, fieldnames=data[0].keys())
        writer.writeheader()
        writer.writerows(data)

# Write the data to CSV files
write_to_csv(customers, 'customers.csv')
write_to_csv(products, 'products.csv')
write_to_csv(orders, 'orders.csv')
write_to_csv(order_items, 'order_items.csv')
write_to_csv(payments, 'payments.csv')

print("Data generation completed!")