<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Available roles.
     */
    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_EDITOR = 'editor';
    const ROLE_VIEWER = 'viewer';

    const ROLES = [
        self::ROLE_SUPER_ADMIN => 'Super Admin',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_EDITOR => 'Editor',
        self::ROLE_VIEWER => 'Viewer',
    ];

    /**
     * Available permission modules.
     */
    const PERMISSION_MODULES = [
        'members' => 'Members',
        'payments' => 'Payments',
        'content' => 'Website Content (CMS)',
        'users' => 'User Management',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'permissions' => 'array',
        ];
    }

    /**
     * Default permissions for each role.
     */
    public static function defaultPermissions(string $role): array
    {
        return match ($role) {
            self::ROLE_SUPER_ADMIN => [
                'members'  => ['view' => true, 'edit' => true],
                'payments' => ['view' => true, 'edit' => true],
                'content'  => ['view' => true, 'edit' => true],
                'users'    => ['view' => true, 'edit' => true],
            ],
            self::ROLE_ADMIN => [
                'members'  => ['view' => true, 'edit' => true],
                'payments' => ['view' => true, 'edit' => true],
                'content'  => ['view' => true, 'edit' => true],
                'users'    => ['view' => true, 'edit' => false],
            ],
            self::ROLE_EDITOR => [
                'members'  => ['view' => true, 'edit' => false],
                'payments' => ['view' => true, 'edit' => false],
                'content'  => ['view' => true, 'edit' => true],
                'users'    => ['view' => false, 'edit' => false],
            ],
            self::ROLE_VIEWER => [
                'members'  => ['view' => true, 'edit' => false],
                'payments' => ['view' => true, 'edit' => false],
                'content'  => ['view' => true, 'edit' => false],
                'users'    => ['view' => false, 'edit' => false],
            ],
            default => [
                'members'  => ['view' => false, 'edit' => false],
                'payments' => ['view' => false, 'edit' => false],
                'content'  => ['view' => false, 'edit' => false],
                'users'    => ['view' => false, 'edit' => false],
            ],
        };
    }

    // ─── Status Helpers ─────────────────

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    // ─── Role Helpers ───────────────────

    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ADMIN]);
    }

    public function isEditor(): bool
    {
        return $this->role === self::ROLE_EDITOR;
    }

    public function isViewer(): bool
    {
        return $this->role === self::ROLE_VIEWER;
    }

    // ─── Permission Helpers ─────────────

    /**
     * Check if user has a specific permission.
     * Super admins always have all permissions.
     */
    public function hasPermission(string $module, string $action = 'view'): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        $perms = $this->permissions ?? self::defaultPermissions($this->role);
        return !empty($perms[$module][$action]);
    }

    public function canView(string $module): bool
    {
        return $this->hasPermission($module, 'view');
    }

    public function canEdit(string $module): bool
    {
        return $this->hasPermission($module, 'edit');
    }

    /**
     * Get the role display label.
     */
    public function getRoleLabelAttribute(): string
    {
        return self::ROLES[$this->role] ?? ucfirst($this->role);
    }
}
