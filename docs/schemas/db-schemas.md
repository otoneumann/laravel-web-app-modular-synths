# Database Schema - Modular Synth App

## Tables

### 1. users
- id (PK)
- name
- email (unique)
- email_verified_at
- password
- remember_token
- created_at
- updated_at

### 2. synth_modules
- id (PK)
- name
- description (nullable)
- image_url (nullable)
- api_id (nullable)
- created_at
- updated_at

### 3. collections
- id (PK)
- user_id (FK → users)
- name
- created_at
- updated_at

### 4. collection_modules (pivot table)
- id (PK)
- collection_id (FK → collections)
- synth_module_id (FK → synth_modules)
- created_at
- updated_at

### 5. patches
- id (PK)
- user_id (FK → users)
- name
- json_data
- created_at
- updated_at

## Relationships

- **User → Collections**: 1:N
- **Collection → SynthModules**: N:M via collection_modules
- **User → Patches**: 1:N

## UML (simplified)

