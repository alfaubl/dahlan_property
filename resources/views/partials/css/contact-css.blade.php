<style>
/* ===== CONTACT PAGE STYLES ===== */
.contact-section {
    padding: 60px 0;
    background: #fafcfc;
}

.contact-header {
    text-align: center;
    margin-bottom: 50px;
}

.contact-header h1 {
    font-size: 2.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 15px;
}

.contact-header p {
    font-size: 1.1rem;
    color: #6c7a8a;
    max-width: 600px;
    margin: 0 auto;
}

/* Contact Grid */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-bottom: 50px;
}

.contact-item {
    background: white;
    border: 1px solid #eef2f6;
    border-radius: 12px;
    padding: 30px 25px;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.01);
}

.contact-item:hover {
    border-color: #4a6fa5;
    box-shadow: 0 10px 30px rgba(74, 111, 165, 0.08);
    transform: translateY(-5px);
}

.contact-icon {
    width: 70px;
    height: 70px;
    background: #f0f4f8;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    transition: all 0.3s ease;
}

.contact-item:hover .contact-icon {
    background: #4a6fa5;
}

.contact-item:hover .contact-icon i {
    color: white;
}

.contact-icon i {
    font-size: 2rem;
    color: #4a6fa5;
    transition: all 0.3s ease;
}

.contact-item h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 15px;
}

.contact-detail {
    font-size: 1.1rem;
    color: #4a6fa5;
    font-weight: 600;
    margin-bottom: 5px;
}

.contact-meta {
    font-size: 0.9rem;
    color: #6c7a8a;
    margin-bottom: 15px;
}

.contact-action {
    display: inline-block;
    color: #4a6fa5;
    font-size: 0.95rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    padding: 8px 20px;
    border-radius: 30px;
    border: 2px solid #eef2f6;
}

.contact-action i {
    font-size: 0.8rem;
    margin-left: 5px;
    transition: transform 0.2s ease;
}

.contact-action:hover {
    background: #4a6fa5;
    color: white;
    border-color: #4a6fa5;
}

.contact-action:hover i {
    transform: translateX(5px);
}

/* Form & Map Section */
.contact-bottom {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    align-items: start;
}

/* Contact Form */
.contact-form {
    background: white;
    border: 1px solid #eef2f6;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.02);
}

.form-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 15px;
}

.form-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: #4a6fa5;
    border-radius: 3px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.95rem;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.2s ease;
    background: white;
}

.form-control:focus {
    outline: none;
    border-color: #4a6fa5;
    box-shadow: 0 0 0 4px rgba(74, 111, 165, 0.1);
}

textarea.form-control {
    resize: vertical;
    min-height: 140px;
}

.btn-submit {
    background: #4a6fa5;
    color: white;
    border: none;
    padding: 16px 32px;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    letter-spacing: 0.5px;
}

.btn-submit:hover {
    background: #2c3e50;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(44, 62, 80, 0.2);
}

.btn-submit i {
    font-size: 1.1rem;
    transition: transform 0.2s ease;
}

.btn-submit:hover i {
    transform: translateX(5px);
}

/* Map Section */
.contact-map {
    background: white;
    border: 1px solid #eef2f6;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.02);
}

.map-container {
    border-radius: 16px;
    overflow: hidden;
    height: 280px;
    margin-bottom: 25px;
    border: 1px solid #e9ecef;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

/* Office Hours */
.office-hours {
    border-top: 1px solid #eef2f6;
    padding-top: 25px;
}

.office-hours h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.office-hours h3 i {
    color: #4a6fa5;
    font-size: 1.2rem;
}

.hours-list {
    margin-bottom: 20px;
}

.hours-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px dashed #e9ecef;
}

.hours-item:last-child {
    border-bottom: none;
}

.hours-day {
    color: #2c3e50;
    font-weight: 600;
    font-size: 0.95rem;
}

.hours-time {
    color: #6c7a8a;
    font-weight: 500;
}

.hours-time.text-danger {
    color: #e74c3c !important;
    font-weight: 600;
}

/* Emergency Contact */
.emergency-contact {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 15px;
    margin: 20px 0;
    border-left: 4px solid #4a6fa5;
}

.emergency-contact i {
    color: #4a6fa5;
    margin-right: 10px;
}

.emergency-contact strong {
    color: #2c3e50;
    display: block;
    margin-bottom: 5px;
}

.emergency-contact span {
    color: #6c7a8a;
    font-size: 0.9rem;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 15px;
    margin-top: 25px;
    justify-content: center;
}

.social-link {
    width: 45px;
    height: 45px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c7a8a;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    text-decoration: none;
}

.social-link:hover {
    background: #4a6fa5;
    color: white;
    transform: translateY(-3px);
    border-color: #4a6fa5;
}

/* Responsive Design */
@media (max-width: 992px) {
    .contact-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .contact-bottom {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .contact-section {
        padding: 40px 0;
    }

    .contact-header h1 {
        font-size: 2rem;
    }

    .contact-header p {
        font-size: 1rem;
    }

    .contact-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .contact-form {
        padding: 30px 20px;
    }

    .form-title {
        font-size: 1.3rem;
    }

    .map-container {
        height: 220px;
    }
}

/* Alert Styles (if needed) */
.alert {
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    border: none;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}
</style>