<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;

abstract class Resources
{
    public readonly AttributeCatalogueResource $attributeCatalogue;
    public readonly AuditLogEventsResource $auditLogEvents;
    public readonly AuditLogSchemasResource $auditLogSchemas;
    public readonly AuditLogsResource $auditLogs;
    public readonly AuthorizationResource $authorization;
    public readonly BrandingResource $branding;
    public readonly ConnectionHealthResource $connectionHealth;
    public readonly ConnectionsResource $connections;
    public readonly CustomDomainsResource $customDomains;
    public readonly DevResource $dev;
    public readonly DirectoriesResource $directories;
    public readonly DirectoryGroupsResource $directoryGroups;
    public readonly DirectoryUsersResource $directoryUsers;
    public readonly DomainsResource $domains;
    public readonly EmailEventsResource $emailEvents;
    public readonly EncryptionKeysResource $encryptionKeys;
    public readonly EnvironmentResource $environment;
    public readonly EventsResource $events;
    public readonly ExportsResource $exports;
    public readonly FeatureFlagsResource $featureFlags;
    public readonly IdpRadarResource $idpRadar;
    public readonly ImportsResource $imports;
    public readonly InvitesResource $invites;
    public readonly ItContactsResource $itContacts;
    public readonly ItEmailConfigurationResource $itEmailConfiguration;
    public readonly LogStreamsResource $logStreams;
    public readonly M2mClientsResource $m2mClients;
    public readonly OauthResource $oauth;
    public readonly OrganizationExportsResource $organizationExports;
    public readonly OrganizationsResource $organizations;
    public readonly PassportResource $passport;
    public readonly PipesResource $pipes;
    public readonly PoliciesResource $policies;
    public readonly PortalResource $portal;
    public readonly PortalProfilesResource $portalProfiles;
    public readonly ProvidersResource $providers;
    public readonly RedirectUrisResource $redirectUris;
    public readonly RequestsResource $requests;
    public readonly RoleRulesResource $roleRules;
    public readonly SessionsResource $sessions;
    public readonly SignInHooksResource $signInHooks;
    public readonly SignInRiskPolicyResource $signInRiskPolicy;
    public readonly SignInsResource $signIns;
    public readonly SsfStreamsResource $ssfStreams;
    public readonly SsoResource $sso;
    public readonly TrustedIssuersResource $trustedIssuers;
    public readonly UploadsResource $uploads;
    public readonly UserManagementResource $userManagement;
    public readonly UsersResource $users;
    public readonly VaultResource $vault;
    public readonly WebhookDeliveriesResource $webhookDeliveries;
    public readonly WebhookEndpointsResource $webhookEndpoints;

    protected function initResources(OhAuthCatClient $client): void
    {
        $this->attributeCatalogue = new AttributeCatalogueResource($client);
        $this->auditLogEvents = new AuditLogEventsResource($client);
        $this->auditLogSchemas = new AuditLogSchemasResource($client);
        $this->auditLogs = new AuditLogsResource($client);
        $this->authorization = new AuthorizationResource($client);
        $this->branding = new BrandingResource($client);
        $this->connectionHealth = new ConnectionHealthResource($client);
        $this->connections = new ConnectionsResource($client);
        $this->customDomains = new CustomDomainsResource($client);
        $this->dev = new DevResource($client);
        $this->directories = new DirectoriesResource($client);
        $this->directoryGroups = new DirectoryGroupsResource($client);
        $this->directoryUsers = new DirectoryUsersResource($client);
        $this->domains = new DomainsResource($client);
        $this->emailEvents = new EmailEventsResource($client);
        $this->encryptionKeys = new EncryptionKeysResource($client);
        $this->environment = new EnvironmentResource($client);
        $this->events = new EventsResource($client);
        $this->exports = new ExportsResource($client);
        $this->featureFlags = new FeatureFlagsResource($client);
        $this->idpRadar = new IdpRadarResource($client);
        $this->imports = new ImportsResource($client);
        $this->invites = new InvitesResource($client);
        $this->itContacts = new ItContactsResource($client);
        $this->itEmailConfiguration = new ItEmailConfigurationResource($client);
        $this->logStreams = new LogStreamsResource($client);
        $this->m2mClients = new M2mClientsResource($client);
        $this->oauth = new OauthResource($client);
        $this->organizationExports = new OrganizationExportsResource($client);
        $this->organizations = new OrganizationsResource($client);
        $this->passport = new PassportResource($client);
        $this->pipes = new PipesResource($client);
        $this->policies = new PoliciesResource($client);
        $this->portal = new PortalResource($client);
        $this->portalProfiles = new PortalProfilesResource($client);
        $this->providers = new ProvidersResource($client);
        $this->redirectUris = new RedirectUrisResource($client);
        $this->requests = new RequestsResource($client);
        $this->roleRules = new RoleRulesResource($client);
        $this->sessions = new SessionsResource($client);
        $this->signInHooks = new SignInHooksResource($client);
        $this->signInRiskPolicy = new SignInRiskPolicyResource($client);
        $this->signIns = new SignInsResource($client);
        $this->ssfStreams = new SsfStreamsResource($client);
        $this->sso = new SsoResource($client);
        $this->trustedIssuers = new TrustedIssuersResource($client);
        $this->uploads = new UploadsResource($client);
        $this->userManagement = new UserManagementResource($client);
        $this->users = new UsersResource($client);
        $this->vault = new VaultResource($client);
        $this->webhookDeliveries = new WebhookDeliveriesResource($client);
        $this->webhookEndpoints = new WebhookEndpointsResource($client);
    }
}
