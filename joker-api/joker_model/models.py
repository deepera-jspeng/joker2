from __future__ import unicode_literals

from django.db import models


class Customer(models.Model):
    cust_id = models.IntegerField(blank=True, null=True)
    segment = models.IntegerField(blank=True, null=True)
    age = models.IntegerField(blank=True, null=True)
    gender = models.TextField(blank=True, null=True)
    gender_f = models.IntegerField(db_column='gender__f', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    gender_m = models.IntegerField(db_column='gender__m', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    yrs_w_club = models.IntegerField(blank=True, null=True)
    is_member = models.IntegerField(blank=True, null=True)
    is_member_0 = models.IntegerField(db_column='is_member__0', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    is_member_1 = models.IntegerField(db_column='is_member__1', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    is_hrs_owner = models.IntegerField(blank=True, null=True)
    is_hrs_owner_0 = models.IntegerField(db_column='is_hrs_owner__0', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    is_hrs_owner_1 = models.IntegerField(db_column='is_hrs_owner__1', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel = models.TextField(blank=True, null=True)
    major_channel_others = models.IntegerField(db_column='major_channel__others', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel_aosbs = models.IntegerField(db_column='major_channel__aosbs', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel_esc = models.IntegerField(db_column='major_channel__esc', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel_ewin = models.IntegerField(db_column='major_channel__ewin', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel_iosbs = models.IntegerField(db_column='major_channel__iosbs', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    major_channel_tel = models.IntegerField(db_column='major_channel__tel', blank=True, null=True)  # Field renamed because it contained more than one '_' in a row.
    active_rate_previous_83 = models.FloatField(blank=True, null=True)
    inv = models.FloatField(blank=True, null=True)
    div = models.FloatField(blank=True, null=True)
    rr = models.FloatField(blank=True, null=True)
    mtg_num = models.IntegerField(blank=True, null=True)
    recent_growth_rate = models.FloatField(blank=True, null=True)
    end_bal = models.FloatField(blank=True, null=True)
    recharge_times = models.IntegerField(blank=True, null=True)
    recharge_amount = models.FloatField(blank=True, null=True)
    withdraw_times = models.IntegerField(blank=True, null=True)
    withdraw_amount = models.FloatField(blank=True, null=True)
    inv1 = models.FloatField(blank=True, null=True)
    inv2 = models.FloatField(blank=True, null=True)
    inv3 = models.FloatField(blank=True, null=True)
    inv4 = models.FloatField(blank=True, null=True)
    inv5 = models.FloatField(blank=True, null=True)
    inv6 = models.FloatField(blank=True, null=True)
    inv7 = models.FloatField(blank=True, null=True)
    inv8 = models.FloatField(blank=True, null=True)
    inv9 = models.FloatField(blank=True, null=True)
    inv10 = models.FloatField(blank=True, null=True)
    inv11 = models.FloatField(blank=True, null=True)
    inv12 = models.FloatField(blank=True, null=True)
    inv13 = models.FloatField(blank=True, null=True)
    inv14 = models.FloatField(blank=True, null=True)
    inv15 = models.FloatField(blank=True, null=True)
    inv16 = models.FloatField(blank=True, null=True)
    inv17 = models.FloatField(blank=True, null=True)
    inv18 = models.FloatField(blank=True, null=True)
    inv19 = models.FloatField(blank=True, null=True)
    inv20 = models.FloatField(blank=True, null=True)
    inv21 = models.FloatField(blank=True, null=True)
    inv22 = models.FloatField(blank=True, null=True)
    inv23 = models.FloatField(blank=True, null=True)
    inv24 = models.FloatField(blank=True, null=True)
    inv25 = models.FloatField(blank=True, null=True)
    inv26 = models.FloatField(blank=True, null=True)
    inv27 = models.FloatField(blank=True, null=True)
    inv28 = models.FloatField(blank=True, null=True)
    inv29 = models.FloatField(blank=True, null=True)
    inv30 = models.FloatField(blank=True, null=True)
    inv31 = models.FloatField(blank=True, null=True)
    inv32 = models.FloatField(blank=True, null=True)
    inv33 = models.FloatField(blank=True, null=True)
    inv34 = models.FloatField(blank=True, null=True)
    inv35 = models.FloatField(blank=True, null=True)
    inv36 = models.FloatField(blank=True, null=True)
    inv37 = models.FloatField(blank=True, null=True)
    inv38 = models.FloatField(blank=True, null=True)
    inv39 = models.FloatField(blank=True, null=True)
    inv40 = models.FloatField(blank=True, null=True)
    inv41 = models.FloatField(blank=True, null=True)
    inv42 = models.FloatField(blank=True, null=True)
    inv43 = models.FloatField(blank=True, null=True)
    inv44 = models.FloatField(blank=True, null=True)
    inv45 = models.FloatField(blank=True, null=True)
    inv46 = models.FloatField(blank=True, null=True)
    inv47 = models.FloatField(blank=True, null=True)
    inv48 = models.FloatField(blank=True, null=True)
    inv49 = models.FloatField(blank=True, null=True)
    inv50 = models.FloatField(blank=True, null=True)
    inv51 = models.FloatField(blank=True, null=True)
    inv52 = models.FloatField(blank=True, null=True)
    inv53 = models.FloatField(blank=True, null=True)
    inv54 = models.FloatField(blank=True, null=True)
    inv55 = models.FloatField(blank=True, null=True)
    inv56 = models.FloatField(blank=True, null=True)
    inv57 = models.FloatField(blank=True, null=True)
    inv58 = models.FloatField(blank=True, null=True)
    inv59 = models.FloatField(blank=True, null=True)
    inv60 = models.FloatField(blank=True, null=True)
    inv61 = models.FloatField(blank=True, null=True)
    inv62 = models.FloatField(blank=True, null=True)
    inv63 = models.FloatField(blank=True, null=True)
    inv64 = models.FloatField(blank=True, null=True)
    inv65 = models.FloatField(blank=True, null=True)
    inv66 = models.FloatField(blank=True, null=True)
    inv67 = models.FloatField(blank=True, null=True)
    inv68 = models.FloatField(blank=True, null=True)
    inv69 = models.FloatField(blank=True, null=True)
    inv70 = models.FloatField(blank=True, null=True)
    inv71 = models.FloatField(blank=True, null=True)
    inv72 = models.FloatField(blank=True, null=True)
    inv73 = models.FloatField(blank=True, null=True)
    inv74 = models.FloatField(blank=True, null=True)
    inv75 = models.FloatField(blank=True, null=True)
    inv76 = models.FloatField(blank=True, null=True)
    inv77 = models.FloatField(blank=True, null=True)
    inv78 = models.FloatField(blank=True, null=True)
    inv79 = models.FloatField(blank=True, null=True)
    inv80 = models.FloatField(blank=True, null=True)
    inv81 = models.FloatField(blank=True, null=True)
    inv82 = models.FloatField(blank=True, null=True)
    inv83 = models.FloatField(blank=True, null=True)
    grow_propensity = models.FloatField(blank=True, null=True)
    decline_propensity = models.FloatField(blank=True, null=True)
    grow_reason_code_1 = models.TextField(blank=True, null=True)
    grow_reason_code_2 = models.TextField(blank=True, null=True)
    grow_reason_code_3 = models.TextField(blank=True, null=True)
    grow_reason_code_4 = models.TextField(blank=True, null=True)
    decline_reason_code_1 = models.TextField(blank=True, null=True)
    decline_reason_code_2 = models.TextField(blank=True, null=True)
    decline_reason_code_3 = models.TextField(blank=True, null=True)
    decline_reason_code_4 = models.TextField(blank=True, null=True)
    turnover_ratio = models.FloatField(blank=True, null=True)
    active_rate_ratio = models.FloatField(blank=True, null=True)
    recovery_rate_ratio = models.FloatField(blank=True, null=True)
    amplification = models.FloatField(blank=True, null=True)
    to_per_mtg = models.FloatField(blank=True, null=True)
    betline_per_mtg = models.FloatField(blank=True, null=True)
    avg_bet_size = models.FloatField(blank=True, null=True)
    to_ytd_growth = models.FloatField(blank=True, null=True)
    to_recent_growth = models.FloatField(blank=True, null=True)
    to_per_mtg_ytd_growth = models.FloatField(blank=True, null=True)
    to_per_mtg_recent_growth = models.FloatField(blank=True, null=True)
    betline_per_mtg_ytd_growth = models.FloatField(blank=True, null=True)
    betline_per_mtg_recent_growth = models.FloatField(blank=True, null=True)
    avg_bet_size_ytd_growth = models.FloatField(blank=True, null=True)
    avg_bet_size_recent_growth = models.FloatField(blank=True, null=True)
    active_rate_ytd_growth = models.FloatField(blank=True, null=True)
    active_rate_recent_growth = models.FloatField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'grow_or_decline'


class ActiveCount(models.Model):
    active_customers_pytd = models.IntegerField(blank=True, null=True)
    active_customers_ytd = models.IntegerField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'm1_active_customers'


class TurnoverGrowthRate(models.Model):
    meeting_id = models.IntegerField(blank=True, null=True)
    turnover_previous_season = models.FloatField(blank=True, null=True)
    turnover_this_season = models.FloatField(blank=True, null=True)
    total_turnover_pytd = models.FloatField(blank=True, null=True)
    total_turnover_ytd = models.FloatField(blank=True, null=True)
    cumulative_growth_rate_of_total_turnover = models.FloatField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'm1_turnover_growth_rate'
