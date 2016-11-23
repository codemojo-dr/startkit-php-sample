<?php

namespace CodeMojo\Client;


/**
 * Class Endpoints
 * @package CodeMojo\Client
 */
class Endpoints
{
    const API_VERSION = 1.0;

    const ENV_SANDBOX = 1;
    const ENV_PRODUCTION = 2;
    const ENV_LOCAL = 3;

    const URL_PRODUCTION = "https://production.codemojo.io";
    const URL_SANDBOX = "https://sandbox.codemojo.io";
    const URL_LOCAL = "http://lh-drewards-services:8888";

    const VERSION = "/v1";

    const ACCESS_TOKEN = "/oauth/access_token";

    /*
     * Wallet Endpoints
     */
    const BASE_WALLET = "/services/wallet";

    const WALLET_CREDITS = "/credits";
    const WALLET_CREDITS_BALANCE = "/credits/balance/%s?transaction_type=%d";

    const WALLET_TRANSACTIONS_ALL = "/transactions/%d";
    const WALLET_TRANSACTIONS_USER = "/transactions/%s/%d";

    const WALLET_TRANSACTION = "/transaction/%s";
    const WALLET_TRANSACTION_REFUND = "/transaction/refund/%s";
    const WALLET_TRANSACTION_UNFREEZE = "/transaction/release";

    /*
     * Loyalty Endpoints
     */
    const BASE_LOYALTY = "/services/loyalty";
    const LOYALTY_CALCULATE = "";
    const LOYALTY_SUMMARY = "/summary/%s";
    const REDEMPTION_CALCULATE = "/calculate-redemption";

    /*
     * Gamification Endpoints
     */
    const BASE_GAMIFICATION = "/services/gamification";
    const GAMIFICATION_ACHIEVEMENTS = "/achievements";
    const GAMIFICATION_CALCULATE = "";
    const GAMIFICATION_SUMMARY = "/summary/%s";

    /*
     * Referral Endpoints
     */
    const BASE_REFERRAL = "/services/referral";
    const REFERRAL_GENERATE = "/generate/%s";
    const REFERRAL_USE = "/claim/%s/%s";
    const REFERRAL_CLAIM = "/claim/%s";

    /*
     * Meta Endpoints
     */
    const BASE_META = "/services/meta";
    const META = "";

    /*
     * DataSync Endpoints
     */
    const BASE_DATASYNC = "/services/data";
    const DATASYNC_USER = "/user";

    /*
     * Rewards Endpoints
     */
    const BASE_REWARDS = "/services/rewards";
    const REWARDS_LIST_ALL_BRANDS = "/list/all-brands/%s";
    const REWARDS_LIST_ALL_REWARDS = "/list/all-rewards/%s";
    const REWARDS_LIST_AVAILABLE_REWARDS = "/list/available-rewards/%s";
    const REWARDS_GRAB = "/grab/%s/%s";
    const REWARDS_REGION_AVAILABILITY = "/region/availability";
}