@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="header-text">
                <h1>Tableau de Bord</h1>
                <p class="text-muted">Aperçu global de votre élevage</p>
            </div>

            @php
                // Déterminer la route de création en fonction de la page actuelle
                $currentRoute = Route::currentRouteName(); // ex: 'males.index', 'femelles.index'
                $createRoute = match($currentRoute) {
                    'males.index' => route('males.create'),
                    'femelles.index' => route('femelles.create'),
                    'saillies.index' => route('saillies.create'),
                    'mises-bas.index' => route('mises-bas.create'),
                    default => '#',
                };
            @endphp

           <div class="header-actions">
                <a href="{{ route('lapin.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Nouvelle entrée
                </a>
            </div>


        </div>

        <div class="header-stats">
            @foreach([
                ['value' => $nbMales + $nbFemelles, 'label' => 'Lapins'],
                ['value' => $nbMales, 'label' => 'Mâles'],
                ['value' => $nbFemelles, 'label' => 'Femelles'],
                ['value' => $nbSaillies, 'label' => 'Saillies'],
                ['value' => $nbMisesBas, 'label' => 'Portées'],
                ['value' => 12, 'label' => 'Alertes']
            ] as $stat)
            <div class="stat-item">
                <div class="stat-value">{{ $stat['value'] }}</div>
                <div class="stat-label">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>



    <!-- Main Content -->
    <div class="dashboard-content">
        <!-- Left Column -->
        <div class="dashboard-column">
            <!-- Quick Actions -->
            <div class="quick-actions">
                <h3>Actions Rapides</h3>
                <div class="actions-grid">
                    @foreach([
                        ['url' => '/males', 'icon' => 'bi-gender-male', 'title' => 'Gérer les mâles'],
                        ['url' => '/femelles', 'icon' => 'bi-gender-female', 'title' => 'Gérer les femelles'],
                        ['url' => '/saillies', 'icon' => 'bi-heart-pulse', 'title' => 'Enregistrer saillie'],
                        ['url' => '/mises-bas', 'icon' => 'bi-motherboard', 'title' => 'Enregistrer mise bas']
                    ] as $action)
                    <a href="{{ url($action['url']) }}" class="action-card">
                        <div class="action-icon">
                            <i class="bi {{ $action['icon'] }}"></i>
                        </div>
                        <div class="action-title">{{ $action['title'] }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
            <!-- Stats Cards -->
            <div class="stats-grid">
                @foreach([
                    ['type' => 'male', 'icon' => 'bi-gender-male', 'value' => $nbMales, 'title' => 'Mâles', 'percent' => $malePercent],
                    ['type' => 'female', 'icon' => 'bi-gender-female', 'value' => $nbFemelles, 'title' => 'Femelles', 'percent' => $femalePercent],
                    ['type' => 'breeding', 'icon' => 'bi-heart-pulse', 'value' => $nbSaillies, 'title' => 'Saillies', 'percent' => $sailliePercent],
                    ['type' => 'births', 'icon' => 'bi-motherboard', 'value' => $nbMisesBas, 'title' => 'Mises bas', 'percent' => $miseBasPercent]
                ] as $card)
                <div class="stat-card {{ $card['type'] }}">
                    <div class="card-icon">
                        <i class="bi {{ $card['icon'] }}"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-value">{{ $card['value'] }}</div>
                        <div class="card-title">{{ $card['title'] }}</div>
                        <div class="card-trend {{ $card['percent'] >= 0 ? 'positive' : 'negative' }}">
                            <i class="bi {{ $card['percent'] >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
                            {{ number_format(abs($card['percent']), 1) }}%
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        <!-- Right Column -->
        <div class="dashboard-column">
            <!-- Calendar Widget -->
            <div class="calendar-widget">
                <div class="widget-header">
                    <h3>Calendrier</h3>
                    <div class="widget-actions">
                        <button class="btn-icon" id="prevMonth"><i class="bi bi-chevron-left"></i></button>
                        <span id="calendarMonthYear"></span>
                        <button class="btn-icon" id="nextMonth"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
                <div class="calendar-grid" id="calendarDays"></div>
            </div>

            <!-- Recent Activity -->
            <div class="activity-widget">
                <div class="widget-header">
                    <h3>Activité Récente</h3>
                    <button class="btn-text">Voir tout</button>
                </div>
                <div class="activity-list">
                    @foreach([
                        ['type' => 'success', 'icon' => 'bi-check-circle', 'title' => 'Mise bas enregistrée', 'desc' => 'Portée de 6 lapereaux', 'time' => 'Il y a 2 heures'],
                        ['type' => 'primary', 'icon' => 'bi-heart-fill', 'title' => 'Saillie programmée', 'desc' => 'Femelle #245 avec mâle #112', 'time' => 'Hier, 15:30'],
                        ['type' => 'warning', 'icon' => 'bi-exclamation-triangle', 'title' => 'Vaccination requise', 'desc' => '3 lapins nécessitent vaccination', 'time' => '23 août 2023']
                    ] as $activity)
                    <div class="activity-item">
                        <div class="activity-icon {{ $activity['type'] }}">
                            <i class="bi {{ $activity['icon'] }}"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">{{ $activity['title'] }}</div>
                            <div class="activity-description">{{ $activity['desc'] }}</div>
                            <div class="activity-time">{{ $activity['time'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Variables */
:root {
    --primary: #4361ee;
    --primary-light: #eef2ff;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --success-light: #e6f7ff;
    --danger: #f72585;
    --danger-light: #ffebf3;
    --warning: #f8961e;
    --warning-light: #fff4e6;
    --info: #4895ef;
    --dark: #212529;
    --light: #f8f9fa;
    --gray: #6c757d;
    --gray-light: #e9ecef;
    --border-radius: 12px;
    --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

/* Base Styles */
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background-color: #f5f7fb;
    color: var(--dark);
    line-height: 1.6;
}

/* Dashboard Container */
.dashboard-container {
    max-width: 1800px;
    margin: 0 auto;
    padding: 20px;
}

/* Header Styles */
.dashboard-header {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    margin-bottom: 24px;
    overflow: hidden;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px;
    border-bottom: 1px solid var(--gray-light);
}

.header-text h1 {
    font-size: 24px;
    font-weight: 600;
    margin: 0;
}

.header-text p {
    margin: 4px 0 0;
    color: var(--gray);
}

.header-actions .btn {
    padding: 8px 16px;
    font-weight: 500;
    border-radius: 8px;
}

.header-stats {
    display: flex;
    padding: 16px 24px;
    background: var(--primary-light);
}

.stat-item {
    flex: 1;
    text-align: center;
    padding: 8px;
}

.stat-value {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary);
}

.stat-label {
    font-size: 14px;
    color: var(--gray);
    margin-top: 4px;
}

/* Dashboard Content Layout */
.dashboard-content {
    display: flex;
    gap: 24px;
}

.dashboard-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Stats Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.stat-card {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 20px;
    display: flex;
    align-items: center;
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 16px;
    font-size: 20px;
    color: white;
}

.stat-card.male .card-icon {
    background: var(--primary);
}

.stat-card.female .card-icon {
    background: var(--danger);
}

.stat-card.breeding .card-icon {
    background: var(--warning);
}

.stat-card.births .card-icon {
    background: var(--success);
}

.card-content {
    flex: 1;
}

.card-value {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 4px;
}

.card-title {
    font-size: 14px;
    color: var(--gray);
    margin-bottom: 8px;
}

.card-trend {
    font-size: 12px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    padding: 4px 8px;
    border-radius: 20px;
}

.card-trend.positive {
    background: rgba(76, 201, 240, 0.1);
    color: var(--success);
}

.card-trend.negative {
    background: rgba(248, 150, 30, 0.1);
    color: var(--warning);
}

/* Quick Actions */
.quick-actions {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 20px;
}

.quick-actions h3 {
    font-size: 18px;
    margin: 0 0 16px;
    font-weight: 600;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.action-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px 12px;
    border-radius: 8px;
    background: var(--light);
    color: var(--dark);
    text-decoration: none;
    transition: var(--transition);
}

.action-card:hover {
    background: var(--primary-light);
    color: var(--primary);
    transform: translateY(-3px);
}

.action-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin-bottom: 12px;
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.action-card:hover .action-icon {
    background: var(--primary);
    color: white;
}

.action-title {
    font-size: 14px;
    font-weight: 500;
    text-align: center;
}

/* Calendar Widget */
.calendar-widget {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 20px;
}

.widget-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.widget-header h3 {
    font-size: 18px;
    margin: 0;
    font-weight: 600;
}

.widget-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--gray);
}

.btn-icon {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--light);
    border: none;
    color: var(--gray);
    cursor: pointer;
    transition: var(--transition);
}

.btn-icon:hover {
    background: var(--primary-light);
    color: var(--primary);
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
}

.calendar-day {
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: var(--gray);
    position: relative;
}

.calendar-day:nth-child(-n+4) {
    color: #adb5bd;
}

.calendar-day.event {
    font-weight: 600;
    color: var(--primary);
}

.event-dot {
    position: absolute;
    bottom: 2px;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--primary);
}

/* Activity Widget */
.activity-widget {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 20px;
}

.btn-text {
    background: none;
    border: none;
    color: var(--primary);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    padding: 0;
}

.activity-list {
    margin-top: 16px;
}

.activity-item {
    display: flex;
    padding: 12px 0;
    border-bottom: 1px solid var(--gray-light);
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    flex-shrink: 0;
    color: white;
    font-size: 14px;
}

.activity-icon.primary {
    background: var(--primary);
}

.activity-icon.success {
    background: var(--success);
}

.activity-icon.warning {
    background: var(--warning);
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 2px;
}

.activity-description {
    font-size: 13px;
    color: var(--gray);
    margin-bottom: 4px;
}

.activity-time {
    font-size: 12px;
    color: var(--gray);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .dashboard-content {
        flex-direction: column;
    }
}

@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .header-stats {
        flex-wrap: wrap;
    }
    
    .stat-item {
        flex: 0 0 50%;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .actions-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .dashboard-container {
        padding: 12px;
    }
    
    .header-stats {
        padding: 12px;
    }
    
    .stat-value {
        font-size: 24px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Calendar functionality
    const calendarDays = document.getElementById('calendarDays');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    
    let currentDate = new Date();

    function renderCalendar(date) {
        calendarDays.innerHTML = '';
        
        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();
        
        // Set month and year title
        calendarMonthYear.textContent = date.toLocaleDateString('fr-FR', {
            month: 'long',
            year: 'numeric'
        });

        // Add empty cells for days before first day of month
        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement('div');
            calendarDays.appendChild(emptyDay);
        }

        // Add days of month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';
            dayElement.textContent = day;

            // Highlight today
            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                dayElement.classList.add('today');
            }

            // Add event dot (example for days 5, 10, 15)
            if ([5, 10, 15].includes(day)) {
                dayElement.classList.add('event');
                const dot = document.createElement('span');
                dot.className = 'event-dot';
                dayElement.appendChild(dot);
            }

            calendarDays.appendChild(dayElement);
        }
    }

    // Event listeners for month navigation
    prevMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    // Initial render
    renderCalendar(currentDate);
});
</script>
@endsection