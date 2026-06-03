```mermaid
erDiagram
    USERS ||--o{ CARS : manages
    BRANDS ||--o{ CAR_MODELS : has
    BRANDS ||--o{ CARS : has
    CAR_MODELS ||--o{ CARS : has
    CARS ||--o{ CAR_IMAGES : has
    CARS ||--o{ CAR_FEATURE_MAP : maps
    CAR_FEATURES ||--o{ CAR_FEATURE_MAP : maps
    CARS ||--o{ INQUIRIES : receives
    CARS ||--o{ SERVICE_REQUESTS : requested_for
    TESTIMONIALS ||--o{ USERS : written_by
    SERVICES ||--o{ SERVICE_REQUESTS : requested_for
    SLIDERS ||--o{ SETTINGS : relates
    PARTNERS ||--o{ SETTINGS : relates
    SETTINGS ||--o{ SEO_META : holds
```
